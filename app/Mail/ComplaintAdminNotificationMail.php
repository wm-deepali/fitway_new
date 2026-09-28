<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintAdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;

    public function __construct($complaint)
    {
        $this->complaint = $complaint;
    }

    public function build()
    {
        return $this->subject('New Complaint Registered — ' . $this->complaint->complaint_code)
            ->view('emails.complaint-admin-notification');
    }
}