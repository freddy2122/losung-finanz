@extends('emails.layout')

@section('content')

@php
    $nom = $financing['nom'] ?? '';
    $prenom = $financing['prenom'] ?? '';
    $nomComplet = trim($nom . ' ' . $prenom);
    $preliminary_information = $preliminary_information ?? [];

    $montantRaw = $financing['montant_du_pret'] ?? 0;
    $montantNumerique = (float) preg_replace('/[^0-9.,]/', '', str_replace(',', '.', (string) $montantRaw));
    $currencyCode = $financing['devise_du_pret'] ?? loan_currency_code_for_locale();
    $montantDisplay = format_loan_money($montantNumerique, $currencyCode);

    $duree = $financing['duree_totale_du_pret'] ?? '-';
    $email = $financing['email'] ?? null;

    $montantTotal = $financing['montant_total_a_rembourser'] ?? '-';
    $mensualite = $financing['mensualite_estimee'] ?? '-';

    $ville = $financing['geo_city'] ?? ($financing['ville'] ?? null);
    $pays = $financing['geo_country'] ?? ($financing['adresse_pays'] ?? null);

    $score = 0;

    if ($montantNumerique >= LOAN_MIN_AMOUNT) $score += 2;
    if ($montantNumerique >= 10000) $score += 2;
    if ($montantNumerique >= 25000) $score += 2;
    if (!empty($email)) $score += 1;
    if (!empty($duree) && $duree !== '-') $score += 1;

    if ($score >= 8) {
        $priorite = '🔥 Priorité haute';
    } elseif ($score >= 5) {
        $priorite = '✅ Priorité normale';
    } else {
        $priorite = '🟡 À vérifier';
    }
@endphp

<p style="margin:0 0 16px 0;font-size:20px;line-height:1.4;font-weight:700;color:#111111;">
    🚀 Nouvelle demande de financement
</p>

<div style="margin:0 0 18px 0;">
    <span style="display:inline-block;background:#111827;color:#ffffff;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
        {{ $priorite }}
    </span>

    <span style="display:inline-block;background:#f3f4f6;color:#111111;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
        🧠 Score : {{ $score }}/10
    </span>

    @if(!empty($client_language))
        <span style="display:inline-block;background:#f3f4f6;color:#111111;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
            Langue du client : {{ $client_language_name ?? strtoupper($client_language) }} ({{ strtoupper($client_language) }})
        </span>
    @endif

    @if($ville || $pays)
        <span style="display:inline-block;background:#f3f4f6;color:#111111;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
            📍 {{ trim(($ville ? $ville : '') . ($ville && $pays ? ', ' : '') . ($pays ? $pays : '')) }}
        </span>
    @endif
</div>

<div style="margin:0 0 22px 0;padding:18px;background-color:#f9fafb;border:1px solid #e5e7eb;">
    <div style="font-size:13px;color:#6b7280;margin-bottom:6px;">Client</div>
    <div style="font-size:24px;line-height:1.3;font-weight:700;color:#111111;margin-bottom:16px;">
        {{ $nomComplet ?: '-' }}
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Montant demandé</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $montantDisplay ?: '-' }}</div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Durée</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $duree }}</div>
            </td>
        </tr>
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Montant total à rembourser</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $montantTotal }}</div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Mensualité estimée</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $mensualite }}</div>
            </td>
        </tr>
    </table>

    @if($email)
        <div style="margin-top:14px;padding-top:14px;border-top:1px solid #e5e7eb;">
            <div style="font-size:13px;color:#6b7280;">Email</div>
            <div style="font-size:20px;font-weight:700;color:#111111;word-break:break-word;">
                <a href="mailto:{{ $email }}" style="color:#2563eb;text-decoration:none;word-break:break-all;">
                    {{ $email }}
                </a>
            </div>
        </div>
    @endif
</div>

@php
    $loanDetails = [
        'Adresse' => $financing['adresse_complete'] ?? null,
        'Pays' => $financing['adresse_pays'] ?? null,
        'Devise' => $financing['devise_du_pret'] ?? null,
        'Taux' => $financing['taux_TEAG'] ?? null,
        translate(626) => $preliminary_information['job'] ?? null,
        translate(627) => isset($preliminary_information['income'])
            ? format_loan_money($preliminary_information['income'], $currencyCode)
            : null,
        translate(463) => $financing['numero_whatsapp'] ?? null,
    ];
@endphp

<div style="margin:0 0 18px 0;padding:18px;background:#f9fafb;border:1px solid #e5e7eb;">
    <p style="margin:0 0 14px 0;font-size:16px;line-height:1.5;font-weight:700;color:#111111;">
        {{ translate(621) }}
    </p>

    @foreach($loanDetails as $label => $value)
        @if($value !== null && $value !== '')
            <div style="padding:0 0 10px 0;margin:0 0 10px 0;border-bottom:1px solid #e5e7eb;">
                <div style="font-size:13px;color:#6b7280;margin-bottom:4px;">{{ $label }}</div>
                <div style="font-size:15px;color:#111111;font-weight:700;word-break:break-word;">{{ $value }}</div>
            </div>
        @endif
    @endforeach
</div>

<div style="margin:0 0 24px 0;padding:18px;background:#f9fafb;border:1px solid #e5e7eb;">
    <p style="margin:0 0 14px 0;font-size:16px;line-height:1.5;font-weight:700;color:#111111;">
        {{ translate(622) }}
    </p>

    @if(!empty($additional_information))
        @php
            $documentLabels = [
                'id_card' => translate(623),
                'passport' => translate(624),
            ];

            $fileCount = 0;
            foreach (['identity_front_path', 'identity_back_path', 'passport_path', 'bank_statement_path'] as $fileKey) {
                if (!empty($additional_information[$fileKey])) {
                    $fileCount++;
                }
            }

            $folderDetails = [
                translate(625) => $additional_information['fullname'] ?? null,
                translate(626) => $preliminary_information['job'] ?? ($additional_information['job'] ?? null),
                translate(627) => isset($preliminary_information['income'])
                    ? format_loan_money($preliminary_information['income'], $currencyCode)
                    : (isset($additional_information['income']) ? format_loan_money($additional_information['income'], $currencyCode) : null),
                translate(628) => $documentLabels[$additional_information['document_type'] ?? ''] ?? ($additional_information['document_type'] ?? null),
                translate(629) => $fileCount > 0 ? $fileCount . ' ' . translate(634) : null,
                translate(643) => !empty($additional_information['bank_statement_path']) ? translate(650) : null,
            ];
        @endphp

        @foreach($folderDetails as $label => $value)
            @if($value !== null && $value !== '')
                <div style="padding:0 0 10px 0;margin:0 0 10px 0;border-bottom:1px solid #e5e7eb;">
                    <div style="font-size:13px;color:#6b7280;margin-bottom:4px;">{{ $label }}</div>
                    <div style="font-size:15px;color:#111111;font-weight:700;word-break:break-word;">{{ $value }}</div>
                </div>
            @endif
        @endforeach
    @else
        <div style="font-size:15px;color:#6b7280;line-height:1.6;">
            {{ translate(651) }}
        </div>
    @endif
    </div>
</div>

@if (isset($location_match) && !$location_match)
    <div style="margin-top:24px;padding:16px;background-color:#fff5f5;border-left:4px solid #dc2626;font-size:14px;line-height:1.7;color:#111111;">
        <strong style="color:#b91c1c;">⚠ Alerte de vérification</strong><br><br>

        L’adresse saisie par l’utilisateur semble ne pas correspondre à sa localisation géographique détectée automatiquement.<br><br>

        <strong>Adresse saisie :</strong><br>
        {{ $adresse_declaree ?? 'Non renseignée' }}<br><br>

        <strong>Localisation détectée (IP) :</strong><br>
        {{ $geo_detectee ?? 'Non détectée' }}
    </div>
@endif

@endsection
