<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FinancingFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Financing as FinancingAdminMail;
use App\Mail\FinancingPreAccepted;
use App\Mail\FinancingCompletedAdmin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Financing extends Controller
{
    public function create()
    {
        $countries = \App\Models\Countries::get();
        $currencies = \App\Models\Currencies::get();

        return view('pages.obtain-financing', compact('countries', 'currencies'));
    }

    public function store(FinancingFormRequest $request)
    {
        $financing = $request->get('financing');
        $email = $financing['email'] ?? null;

        $requestPrefix = defined('LOAN_REFERENCE_PREFIX') ? LOAN_REFERENCE_PREFIX : 'FIN';
        $requestId = $requestPrefix . '-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
        $financing['reference'] = $requestId;

        if ($email) {
            $files = Storage::disk('local')->files('loan_requests');

            foreach ($files as $file) {
                $content = Storage::disk('local')->get($file);
                $existing = json_decode($content, true);

                if (!$existing) {
                    continue;
                }

                $existingEmail = $existing['financing']['email'] ?? null;
                $createdAt = isset($existing['created_at']) ? strtotime($existing['created_at']) : null;

                if (
                    $existingEmail &&
                    strtolower($existingEmail) === strtolower($email) &&
                    $createdAt &&
                    (time() - $createdAt < 120)
                ) {
                    return $this->redirectToThankYou(
                        $existing['financing'] ?? $financing,
                        $existing['request_id'] ?? $requestId,
                        empty($existing['additional_information']['submitted_at'] ?? null)
                    );
                }
            }
        }

        $geoCity = $request->input('financing.geo_city');
        $geoCountry = $request->input('financing.geo_country');
        $geoRegion = $request->input('financing.geo_region');

        $montant = floatval(str_replace([' ', ','], ['', '.'], $financing['montant_du_pret'] ?? 0));
        $duree = intval($financing['duree_totale_du_pret'] ?? 0);
        $currencyCode = loan_currency_code_for_locale(app()->getLocale());

        $taux_annuel = floatval(str_replace('%', '', TEAG));
        $taux_mensuel = $taux_annuel / 12 / 100;

        if ($montant > 0 && $duree > 0) {
            if ($taux_mensuel > 0) {
                $mensualite = $montant * ($taux_mensuel / (1 - pow(1 + $taux_mensuel, -$duree)));
            } else {
                $mensualite = $montant / $duree;
            }

            $mensualite = round($mensualite, 2);
            $montant_total = round($mensualite * $duree, 2);
        } else {
            $mensualite = 0;
            $montant_total = 0;
        }

        $financing['devise_du_pret'] = $currencyCode;
        $financing['montant_total_a_rembourser'] = format_loan_money($montant_total, $currencyCode, 2);
        $financing['mensualite_estimee'] = format_loan_money($mensualite, $currencyCode, 2);
        $financing['taux_TEAG'] = TEAG;

        $data = [
            'name' => ($financing['nom'] ?? '') . ' ' . ($financing['prenom'] ?? ''),
            'subject' => 'Nouvelle demande de prêt',
            'request_id' => $requestId,
            'financing' => $financing,
        ];

        $preliminaryInformation = [
            'job' => $request->input('job'),
            'income' => $request->input('income'),
        ];

        $payload = [
            'request_id' => $requestId,
            'status' => 'pending_documents',
            'created_at' => now()->toDateTimeString(),
            'language' => app()->getLocale(),
            'financing' => $financing,
            'mail_data' => $data,
            'preliminary_information' => $preliminaryInformation,
        ];

        Storage::disk('local')->put(
            'loan_requests/' . $requestId . '.json',
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $adresseDeclaree = trim(($financing['adresse_complete'] ?? '') . ', ' . ($financing['adresse_pays'] ?? ''));
        $geoDetectee = trim(($geoCity ?? '') . ($geoCity && $geoCountry ? ', ' : '') . ($geoCountry ?? ''));

        $adminMailSent = $this->sendMailWithRetry(
            (new FinancingAdminMail([
                'subject' => 'Nouvelle demande de financement - ' . $requestId,
                'financing' => $financing,
                'adresse_declaree' => $adresseDeclaree,
                'geo_detectee' => $geoDetectee,
                'location_match' => true,
                'request_id' => $requestId,
                'client_language' => app()->getLocale(),
                'preliminary_information' => $preliminaryInformation,
            ]))->locale('fr'),
            SITE_EMAIL
        );

        if (!$adminMailSent) {
            Log::error('Admin financing notification failed for request ' . $requestId);
        }

        if (!empty($financing['email'])) {
            $mailData = [
                'name' => trim(($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? '')),
                'request_id' => $requestId,
                'financing' => $financing,
                'complete_documents_url' => route('site.complete_financing', [
                    'language' => app()->getLocale(),
                    'reference' => $requestId,
                ]),
            ];

            $this->sendMailWithRetry(
                new FinancingPreAccepted($mailData),
                $financing['email']
            );
        }

        return $this->redirectToThankYou($financing, $requestId, true);
    }

    public function showCompleteFinancingForm(Request $request)
    {
        $reference = trim($request->route('reference') ?? $request->get('reference', ''));
        $reference = ltrim($reference, '#');

        $loanRequest = null;
        $fullname = null;

        if ($reference) {
            $relativePath = 'loan_requests/' . $reference . '.json';

            if (Storage::disk('local')->exists($relativePath)) {
                $content = Storage::disk('local')->get($relativePath);
                $payload = json_decode($content, true);

                if ($payload && isset($payload['financing'])) {
                    if (!empty($payload['additional_information']['submitted_at'])) {
                        $financing = $payload['financing'];
                        $financing['reference'] = $payload['request_id'] ?? $reference;

                        return $this->redirectToThankYou($financing, $payload['request_id'] ?? $reference, false, true);
                    }

                    $loanRequest = $payload;

                    $prenom = $payload['financing']['prenom'] ?? '';
                    $nom = $payload['financing']['nom'] ?? '';
                    $fullname = trim($prenom . ' ' . $nom);
                }
            }
        }

        return view('pages.complete_financing', [
            'reference' => $reference,
            'loanRequest' => $loanRequest,
            'fullname' => $fullname,
        ]);
    }

    public function completeFinancing(Request $request)
    {
        $request->validate([
            'reference' => ['required', 'string'],
            'fullname' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'in:id_card,passport'],
            'identity_front' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:8192'],
            'identity_back' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:8192'],
            'passport_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:8192'],
            'bank_statement' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:8192'],
        ]);

        $reference = trim($request->reference);
        $reference = ltrim($reference, '#');

        $relativePath = 'loan_requests/' . $reference . '.json';

        if (!Storage::disk('local')->exists($relativePath)) {
            return redirect()->back()->with('error', 'Numéro de dossier introuvable.')->withInput();
        }

        $content = Storage::disk('local')->get($relativePath);
        $payload = json_decode($content, true);

        if (!$payload || !isset($payload['financing'])) {
            return redirect()->back()->with('error', 'Dossier invalide.')->withInput();
        }

        if (!empty($payload['additional_information']['submitted_at'])) {
            $financing = $payload['financing'];
            $financing['reference'] = $payload['request_id'] ?? $reference;

            return $this->redirectToThankYou($financing, $payload['request_id'] ?? $reference, false, true);
        }

        if ($request->document_type === 'id_card') {
            if (!$request->hasFile('identity_front') || !$request->hasFile('identity_back')) {
                return redirect()->back()->with('error', translate(529) . ' / ' . translate(530))->withInput();
            }
        }

        if ($request->document_type === 'passport') {
            if (!$request->hasFile('passport_file')) {
                return redirect()->back()->with('error', translate(531))->withInput();
            }
        }

        if (!$request->hasFile('bank_statement')) {
            return redirect()->back()->with('error', translate(645))->withInput();
        }

        $identityFrontPath = $request->hasFile('identity_front')
            ? $request->file('identity_front')->store('loan_documents/identity_front', 'local')
            : null;

        $identityBackPath = $request->hasFile('identity_back')
            ? $request->file('identity_back')->store('loan_documents/identity_back', 'local')
            : null;

        $passportPath = $request->hasFile('passport_file')
            ? $request->file('passport_file')->store('loan_documents/passport', 'local')
            : null;

        $bankStatementPath = $request->file('bank_statement')->store('loan_documents/bank_statement', 'local');

        $payload['additional_information'] = [
            'fullname' => $request->fullname,
            'document_type' => $request->document_type,
            'identity_front_path' => $identityFrontPath,
            'identity_back_path' => $identityBackPath,
            'passport_path' => $passportPath,
            'bank_statement_path' => $bankStatementPath,
            'submitted_at' => now()->toDateTimeString(),
        ];

        $payload['status'] = 'documents_received';

        Storage::disk('local')->put(
            $relativePath,
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $financing = $payload['financing'];
        $financing['reference'] = $payload['request_id'] ?? $reference;
        $clientLanguage = $payload['language'] ?? app()->getLocale();

        $preliminary = $payload['preliminary_information'] ?? [];

        $mailAdminData = [
            'request_id' => $payload['request_id'] ?? $reference,
            'subject' => 'Pièces justificatives reçues - ' . ($payload['request_id'] ?? $reference),
            'financing' => $financing,
            'created_at' => $payload['created_at'] ?? null,
            'client_language' => $clientLanguage,
            'additional_information' => $payload['additional_information'],
            'preliminary_information' => $preliminary,
            'fullname' => $request->fullname,
            'job' => $preliminary['job'] ?? null,
            'income' => $preliminary['income'] ?? null,
            'currency_code' => $financing['devise_du_pret'] ?? loan_currency_code_for_locale(app()->getLocale()),
            'document_type' => $request->document_type,
            'identity_front' => $identityFrontPath ?? null,
            'identity_back' => $identityBackPath ?? null,
            'passport' => $passportPath ?? null,
            'bank_statement' => $bankStatementPath ?? null,
        ];

        $adminMailSent = $this->sendMailWithRetry(
            (new FinancingCompletedAdmin($mailAdminData))->locale('fr'),
            SITE_EMAIL
        );

        if (!$adminMailSent) {
            Log::error('Admin completed financing email failed for request ' . ($payload['request_id'] ?? $reference));
        }

        return $this->redirectToThankYou($financing, $payload['request_id'] ?? $reference, false, true);
    }

    private function redirectToThankYou(array $financing, string $requestId, bool $documentsPending = false, bool $documentsCompleted = false)
    {
        return redirect()->route('thankyou.localized', [
            'language' => app()->getLocale(),
        ])->with([
            'nom' => ucfirst(strtolower($financing['prenom'] ?? '')) . ' ' . ucfirst(strtolower($financing['nom'] ?? '')),
            'montant' => $financing['montant_du_pret'] ?? '',
            'duree' => $financing['duree_totale_du_pret'] ?? '',
            'reference' => $requestId,
            'documents_pending' => $documentsPending,
            'documents_completed' => $documentsCompleted,
        ]);
    }


    private function sendMailWithRetry($mailable, $email, $maxAttempts = 3, $retryDelaySeconds = 2)
    {
        $attempt = 0;

        while ($attempt < $maxAttempts) {
            try {
                Mail::to($email)->send($mailable);
                return true;
            } catch (\Exception $e) {
                Log::error('Mail delivery failed', [
                    'attempt' => $attempt + 1,
                    'recipient' => $email,
                    'mailable' => get_class($mailable),
                    'message' => $e->getMessage(),
                ]);
                $attempt++;

                if ($attempt < $maxAttempts && $retryDelaySeconds > 0) {
                    sleep($retryDelaySeconds);
                }
            }
        }

        return false;
    }
}
