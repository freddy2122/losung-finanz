<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinancingPreAccepted extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $currencyCode = $this->data['financing']['devise_du_pret'] ?? loan_currency_code_for_locale();

        return $this->subject(
            '✔ ' . (($this->data['financing']['montant_du_pret'] ?? '')
                ? format_loan_money($this->data['financing']['montant_du_pret'], $currencyCode) . ' - '
                : '') . translate(489)
        )
            ->view('emails.financing_preaccepted')
            ->with([
                'fullname' => $this->data['name'],
                'financing' => $this->data['financing'],
                'request_id' => $this->data['request_id'] ?? '',
                'complete_documents_url' => $this->data['complete_documents_url'] ?? '',
            ]);
    }
}
