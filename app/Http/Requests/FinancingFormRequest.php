<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FloatNumberRule;

class FinancingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $financing = $this->input('financing', []);
        $fullName = trim(preg_replace('/\s+/', ' ', (string) ($financing['nom_complet'] ?? '')));

        if ($fullName !== '') {
            $parts = preg_split('/\s+/', $fullName, 2);
            $financing['nom_complet'] = $fullName;
            $financing['prenom'] = $parts[0] ?? '';
            $financing['nom'] = $parts[1] ?? ($parts[0] ?? '');
        }

        $this->merge(['financing' => $financing]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'financing' => 'required|array',
            'financing.montant_du_pret' => [
                'required',
                new FloatNumberRule(),
                function ($attribute, $value, $fail) {
                    $amount = (float) str_replace([' ', ','], ['', '.'], (string) $value);
                    $minAmount = loan_min_amount_for_locale();

                    if ($amount < $minAmount) {
                        $fail(translate(476));
                    }
                },
            ],
            'financing.devise_du_pret' => 'required|string',
            'financing.duree_totale_du_pret' => 'required|integer|in:' . implode(',', LOAN_DURATION_OPTIONS),
            'financing.nom_complet' => 'required|string|min:2|max:255',
            'financing.nom' => 'nullable|string|max:255',
            'financing.prenom' => 'nullable|string|max:255',
            'financing.adresse_complete' => 'required|string',
            'financing.adresse_codepostal' => 'nullable|string',
            'financing.adresse_ville' => 'nullable|string',
            'financing.adresse_pays' => 'required|string',
            'financing.email' => 'required|email',
            'financing.sexe' => 'required|string',
            'financing.numero_whatsapp' => 'required|string|max:40',
            'financing.revenu_mensuel' => ['nullable', new FloatNumberRule()],
            'financing.objectif_du_pret' => 'nullable|string',
            'financing.geo_city' => 'nullable|string',
            'financing.geo_country' => 'nullable|string',
            'financing.geo_region' => 'nullable|string',

            'job' => ['required', 'string', 'max:255'],
            'income' => ['required', 'numeric', 'min:0'],
            'privacy_policy_accepted' => ['accepted'],
        ];
    }

    public function messages()
    {
        return [
            'financing.email.required' => translate(203),
            'financing.email.email' => translate(203),
            'privacy_policy_accepted.accepted' => translate(686),
        ];
    }

    private function loanValidationText(string $key): string
    {
        $locale = app()->getLocale();
        $texts = [
            'identity_front_required' => [
                'ch' => 'Ajoutez le recto de votre pièce d’identité.',
                'de' => 'Fügen Sie die Vorderseite Ihres Ausweises hinzu.',
                'el' => 'Προσθέστε την μπροστινή όψη του εγγράφου ταυτότητάς σας.',
                'en' => 'Add the front side of your identity document.',
                'es' => 'Añada el anverso de su documento de identidad.',
                'fi' => 'Lisää henkilöllisyystodistuksesi etupuoli.',
                'fr' => 'Ajoutez le recto de votre pièce d’identité.',
                'it' => 'Aggiungi il fronte del tuo documento d’identità.',
                'pl' => 'Dodaj przednią stronę dokumentu tożsamości.',
                'pt' => 'Adicione a frente do seu documento de identidade.',
                'sv' => 'Lägg till framsidan av din identitetshandling.',
            ],
            'identity_back_required' => [
                'ch' => 'Ajoutez le verso de votre pièce d’identité.',
                'de' => 'Fügen Sie die Rückseite Ihres Ausweises hinzu.',
                'el' => 'Προσθέστε την πίσω όψη του εγγράφου ταυτότητάς σας.',
                'en' => 'Add the back side of your identity document.',
                'es' => 'Añada el reverso de su documento de identidad.',
                'fi' => 'Lisää henkilöllisyystodistuksesi takapuoli.',
                'fr' => 'Ajoutez le verso de votre pièce d’identité.',
                'it' => 'Aggiungi il retro del tuo documento d’identità.',
                'pl' => 'Dodaj tylną stronę dokumentu tożsamości.',
                'pt' => 'Adicione o verso do seu documento de identidade.',
                'sv' => 'Lägg till baksidan av din identitetshandling.',
            ],
            'passport_required' => [
                'ch' => 'Ajoutez votre passeport.',
                'de' => 'Fügen Sie Ihren Reisepass hinzu.',
                'el' => 'Προσθέστε το διαβατήριό σας.',
                'en' => 'Add your passport.',
                'es' => 'Añada su pasaporte.',
                'fi' => 'Lisää passisi.',
                'fr' => 'Ajoutez votre passeport.',
                'it' => 'Aggiungi il tuo passaporto.',
                'pl' => 'Dodaj swój paszport.',
                'pt' => 'Adicione o seu passaporte.',
                'sv' => 'Lägg till ditt pass.',
            ],
            'identity_front_uploaded' => [
                'ch' => 'Le recto de votre pièce d’identité n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'de' => 'Die Vorderseite Ihres Ausweises konnte nicht hochgeladen werden. Prüfen Sie, ob die Datei JPG, PNG oder PDF ist und höchstens 8 MB groß ist.',
                'el' => 'Η μπροστινή όψη του εγγράφου ταυτότητάς σας δεν μπόρεσε να σταλεί. Βεβαιωθείτε ότι το αρχείο είναι JPG, PNG ή PDF και δεν ξεπερνά τα 8 MB.',
                'en' => 'The front side of your identity document could not be uploaded. Make sure the file is JPG, PNG or PDF and no larger than 8 MB.',
                'es' => 'No se pudo enviar el anverso de su documento de identidad. Compruebe que el archivo sea JPG, PNG o PDF y que no supere los 8 MB.',
                'fi' => 'Henkilöllisyystodistuksesi etupuolta ei voitu lähettää. Varmista, että tiedosto on JPG, PNG tai PDF ja enintään 8 Mt.',
                'fr' => 'Le recto de votre pièce d’identité n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'it' => 'Non è stato possibile inviare il fronte del tuo documento d’identità. Verifica che il file sia JPG, PNG o PDF e non superi 8 MB.',
                'pl' => 'Nie udało się wysłać przedniej strony dokumentu tożsamości. Upewnij się, że plik jest w formacie JPG, PNG lub PDF i nie przekracza 8 MB.',
                'pt' => 'Não foi possível enviar a frente do seu documento de identidade. Verifique se o ficheiro está em JPG, PNG ou PDF e não excede 8 MB.',
                'sv' => 'Framsidan av din identitetshandling kunde inte skickas. Kontrollera att filen är JPG, PNG eller PDF och inte större än 8 MB.',
            ],
            'identity_back_uploaded' => [
                'ch' => 'Le verso de votre pièce d’identité n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'de' => 'Die Rückseite Ihres Ausweises konnte nicht hochgeladen werden. Prüfen Sie, ob die Datei JPG, PNG oder PDF ist und höchstens 8 MB groß ist.',
                'el' => 'Η πίσω όψη του εγγράφου ταυτότητάς σας δεν μπόρεσε να σταλεί. Βεβαιωθείτε ότι το αρχείο είναι JPG, PNG ή PDF και δεν ξεπερνά τα 8 MB.',
                'en' => 'The back side of your identity document could not be uploaded. Make sure the file is JPG, PNG or PDF and no larger than 8 MB.',
                'es' => 'No se pudo enviar el reverso de su documento de identidad. Compruebe que el archivo sea JPG, PNG o PDF y que no supere los 8 MB.',
                'fi' => 'Henkilöllisyystodistuksesi takapuolta ei voitu lähettää. Varmista, että tiedosto on JPG, PNG tai PDF ja enintään 8 Mt.',
                'fr' => 'Le verso de votre pièce d’identité n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'it' => 'Non è stato possibile inviare il retro del tuo documento d’identità. Verifica che il file sia JPG, PNG o PDF e non superi 8 MB.',
                'pl' => 'Nie udało się wysłać tylnej strony dokumentu tożsamości. Upewnij się, że plik jest w formacie JPG, PNG lub PDF i nie przekracza 8 MB.',
                'pt' => 'Não foi possível enviar o verso do seu documento de identidade. Verifique se o ficheiro está em JPG, PNG ou PDF e não excede 8 MB.',
                'sv' => 'Baksidan av din identitetshandling kunde inte skickas. Kontrollera att filen är JPG, PNG eller PDF och inte större än 8 MB.',
            ],
            'passport_uploaded' => [
                'ch' => 'Le passeport n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'de' => 'Der Reisepass konnte nicht hochgeladen werden. Prüfen Sie, ob die Datei JPG, PNG oder PDF ist und höchstens 8 MB groß ist.',
                'el' => 'Το διαβατήριο δεν μπόρεσε να σταλεί. Βεβαιωθείτε ότι το αρχείο είναι JPG, PNG ή PDF και δεν ξεπερνά τα 8 MB.',
                'en' => 'The passport could not be uploaded. Make sure the file is JPG, PNG or PDF and no larger than 8 MB.',
                'es' => 'No se pudo enviar el pasaporte. Compruebe que el archivo sea JPG, PNG o PDF y que no supere los 8 MB.',
                'fi' => 'Passia ei voitu lähettää. Varmista, että tiedosto on JPG, PNG tai PDF ja enintään 8 Mt.',
                'fr' => 'Le passeport n’a pas pu être envoyé. Vérifiez que le fichier est en JPG, PNG ou PDF et qu’il ne dépasse pas 8 Mo.',
                'it' => 'Non è stato possibile inviare il passaporto. Verifica che il file sia JPG, PNG o PDF e non superi 8 MB.',
                'pl' => 'Nie udało się wysłać paszportu. Upewnij się, że plik jest w formacie JPG, PNG lub PDF i nie przekracza 8 MB.',
                'pt' => 'Não foi possível enviar o passaporte. Verifique se o ficheiro está em JPG, PNG ou PDF e não excede 8 MB.',
                'sv' => 'Passet kunde inte skickas. Kontrollera att filen är JPG, PNG eller PDF och inte större än 8 MB.',
            ],
            'identity_front_mimes' => [
                'ch' => 'Le recto de votre pièce d’identité doit être un fichier JPG, PNG ou PDF.',
                'de' => 'Die Vorderseite Ihres Ausweises muss eine JPG-, PNG- oder PDF-Datei sein.',
                'el' => 'Η μπροστινή όψη του εγγράφου ταυτότητάς σας πρέπει να είναι αρχείο JPG, PNG ή PDF.',
                'en' => 'The front side of your identity document must be a JPG, PNG or PDF file.',
                'es' => 'El anverso de su documento de identidad debe ser un archivo JPG, PNG o PDF.',
                'fi' => 'Henkilöllisyystodistuksesi etupuolen on oltava JPG-, PNG- tai PDF-tiedosto.',
                'fr' => 'Le recto de votre pièce d’identité doit être un fichier JPG, PNG ou PDF.',
                'it' => 'Il fronte del tuo documento d’identità deve essere un file JPG, PNG o PDF.',
                'pl' => 'Przednia strona dokumentu tożsamości musi być plikiem JPG, PNG lub PDF.',
                'pt' => 'A frente do seu documento de identidade deve ser um ficheiro JPG, PNG ou PDF.',
                'sv' => 'Framsidan av din identitetshandling måste vara en JPG-, PNG- eller PDF-fil.',
            ],
            'identity_back_mimes' => [
                'ch' => 'Le verso de votre pièce d’identité doit être un fichier JPG, PNG ou PDF.',
                'de' => 'Die Rückseite Ihres Ausweises muss eine JPG-, PNG- oder PDF-Datei sein.',
                'el' => 'Η πίσω όψη του εγγράφου ταυτότητάς σας πρέπει να είναι αρχείο JPG, PNG ή PDF.',
                'en' => 'The back side of your identity document must be a JPG, PNG or PDF file.',
                'es' => 'El reverso de su documento de identidad debe ser un archivo JPG, PNG o PDF.',
                'fi' => 'Henkilöllisyystodistuksesi takapuolen on oltava JPG-, PNG- tai PDF-tiedosto.',
                'fr' => 'Le verso de votre pièce d’identité doit être un fichier JPG, PNG ou PDF.',
                'it' => 'Il retro del tuo documento d’identità deve essere un file JPG, PNG o PDF.',
                'pl' => 'Tylna strona dokumentu tożsamości musi być plikiem JPG, PNG lub PDF.',
                'pt' => 'O verso do seu documento de identidade deve ser um ficheiro JPG, PNG ou PDF.',
                'sv' => 'Baksidan av din identitetshandling måste vara en JPG-, PNG- eller PDF-fil.',
            ],
            'passport_mimes' => [
                'ch' => 'Le passeport doit être un fichier JPG, PNG ou PDF.',
                'de' => 'Der Reisepass muss eine JPG-, PNG- oder PDF-Datei sein.',
                'el' => 'Το διαβατήριο πρέπει να είναι αρχείο JPG, PNG ή PDF.',
                'en' => 'The passport must be a JPG, PNG or PDF file.',
                'es' => 'El pasaporte debe ser un archivo JPG, PNG o PDF.',
                'fi' => 'Passin on oltava JPG-, PNG- tai PDF-tiedosto.',
                'fr' => 'Le passeport doit être un fichier JPG, PNG ou PDF.',
                'it' => 'Il passaporto deve essere un file JPG, PNG o PDF.',
                'pl' => 'Paszport musi być plikiem JPG, PNG lub PDF.',
                'pt' => 'O passaporte deve ser um ficheiro JPG, PNG ou PDF.',
                'sv' => 'Passet måste vara en JPG-, PNG- eller PDF-fil.',
            ],
            'identity_front_max' => [
                'ch' => 'Le recto de votre pièce d’identité ne doit pas dépasser 8 Mo.',
                'de' => 'Die Vorderseite Ihres Ausweises darf höchstens 8 MB groß sein.',
                'el' => 'Η μπροστινή όψη του εγγράφου ταυτότητάς σας δεν πρέπει να ξεπερνά τα 8 MB.',
                'en' => 'The front side of your identity document must not exceed 8 MB.',
                'es' => 'El anverso de su documento de identidad no debe superar los 8 MB.',
                'fi' => 'Henkilöllisyystodistuksesi etupuoli saa olla enintään 8 Mt.',
                'fr' => 'Le recto de votre pièce d’identité ne doit pas dépasser 8 Mo.',
                'it' => 'Il fronte del tuo documento d’identità non deve superare 8 MB.',
                'pl' => 'Przednia strona dokumentu tożsamości nie może przekraczać 8 MB.',
                'pt' => 'A frente do seu documento de identidade não deve exceder 8 MB.',
                'sv' => 'Framsidan av din identitetshandling får inte överstiga 8 MB.',
            ],
            'identity_back_max' => [
                'ch' => 'Le verso de votre pièce d’identité ne doit pas dépasser 8 Mo.',
                'de' => 'Die Rückseite Ihres Ausweises darf höchstens 8 MB groß sein.',
                'el' => 'Η πίσω όψη του εγγράφου ταυτότητάς σας δεν πρέπει να ξεπερνά τα 8 MB.',
                'en' => 'The back side of your identity document must not exceed 8 MB.',
                'es' => 'El reverso de su documento de identidad no debe superar los 8 MB.',
                'fi' => 'Henkilöllisyystodistuksesi takapuoli saa olla enintään 8 Mt.',
                'fr' => 'Le verso de votre pièce d’identité ne doit pas dépasser 8 Mo.',
                'it' => 'Il retro del tuo documento d’identità non deve superare 8 MB.',
                'pl' => 'Tylna strona dokumentu tożsamości nie może przekraczać 8 MB.',
                'pt' => 'O verso do seu documento de identidade não deve exceder 8 MB.',
                'sv' => 'Baksidan av din identitetshandling får inte överstiga 8 MB.',
            ],
            'passport_max' => [
                'ch' => 'Le passeport ne doit pas dépasser 8 Mo.',
                'de' => 'Der Reisepass darf höchstens 8 MB groß sein.',
                'el' => 'Το διαβατήριο δεν πρέπει να ξεπερνά τα 8 MB.',
                'en' => 'The passport must not exceed 8 MB.',
                'es' => 'El pasaporte no debe superar los 8 MB.',
                'fi' => 'Passi saa olla enintään 8 Mt.',
                'fr' => 'Le passeport ne doit pas dépasser 8 Mo.',
                'it' => 'Il passaporto non deve superare 8 MB.',
                'pl' => 'Paszport nie może przekraczać 8 MB.',
                'pt' => 'O passaporte não deve exceder 8 MB.',
                'sv' => 'Passet får inte överstiga 8 MB.',
            ],
        ];

        return $texts[$key][$locale]
            ?? ($locale === 'ch' ? ($texts[$key]['de'] ?? null) : null)
            ?? $texts[$key]['fr'];
    }
}
