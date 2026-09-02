<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminEnquiryAlert extends Mailable
{
    use Queueable, SerializesModels;

    public string $formName;
    public array $fields;

    /**
     * @param string $formName e.g. "Contact Us Form"
     * @param array  $fields   key => value pairs to show in the email
     */
    public function __construct(string $formName, array $fields)
    {
        $this->formName = $formName;
        $this->fields = $fields;
    }

    public function build()
    {
        return $this->subject("New Enquiry: {$this->formName} — Fitway")
            ->view('emails.admin-enquiry-alert');
    }
}