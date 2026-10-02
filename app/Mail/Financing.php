<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Financing extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data['subject'])
            ->view('emails.financing')
            ->with([
                'financing' => $this->data['financing'],
                'adresse_declaree' => $this->data['adresse_declaree'],
                'geo_detectee' => $this->data['geo_detectee'],
                'location_match' => $this->data['location_match'],
                'request_id' => $this->data['request_id'] ?? null,
                'client_language' => $this->data['client_language'] ?? null,
                'preliminary_information' => $this->data['preliminary_information'] ?? null,
                'additional_information' => $this->data['additional_information'] ?? null,
            ]);
    }
}
