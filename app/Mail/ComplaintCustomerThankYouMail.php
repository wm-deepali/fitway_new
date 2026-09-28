<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintCustomerThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public $generalSettings;

    public function __construct($complaint, $generalSettings = null)
    {
        $this->complaint = $complaint;
        $this->generalSettings = $generalSettings;
    }

    public function build()
    {
        return $this->subject('We\'ve Received Your Complaint — ' . $this->complaint->complaint_code)
            ->view('emails.complaint-customer-thankyou');
    }
}