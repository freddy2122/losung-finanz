<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FinancingCompletedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $mail = $this->subject($this->data['subject'])
            ->view('emails.financing_completed_admin')
            ->with([
                'request_id' => $this->data['request_id'],
                'financing' => $this->data['financing'],
                'created_at' => $this->data['created_at'],
                'client_language' => $this->data['client_language'],
                'additional_information' => $this->data['additional_information'],
                'preliminary_information' => $this->data['preliminary_information'] ?? null,
                'fullname' => $this->data['fullname'],
                'job' => $this->data['job'],
                'income' => $this->data['income'],
                'currency_code' => $this->data['currency_code'],
                'document_type' => $this->data['document_type'],
                'identity_front' => $this->data['identity_front'],
                'identity_back' => $this->data['identity_back'],
                'passport' => $this->data['passport'],
                'bank_statement' => $this->data['bank_statement'] ?? null,
            ]);

        foreach (['identity_front', 'identity_back', 'passport', 'bank_statement'] as $key) {
            $relativePath = $this->data[$key] ?? null;

            if ($relativePath && Storage::disk('local')->exists($relativePath)) {
                $mail->attach(Storage::disk('local')->path($relativePath), [
                    'as' => $key . '.' . pathinfo($relativePath, PATHINFO_EXTENSION),
                ]);
            }
        }

        return $mail;
    }
}
