<?php

namespace App\Services;

use App\Mail\AdminEnquiryAlert;
use App\Models\SmtpSetting;
use App\Models\GeneralSetting;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminMailer
{
    /**
     * Enquiry alert to admin (existing behaviour, unchanged for callers).
     */
    public static function sendEnquiryAlert(string $formName, array $fields): void
    {
        self::sendToAdmin(new AdminEnquiryAlert($formName, $fields));
    }

    /**
     * Send any mailable to the admin. Respects the "admin enquiry alert" switch.
     */
    public static function sendToAdmin(Mailable $mailable): void
    {
        $smtp = SmtpSetting::first();

        if (!$smtp || !$smtp->admin_enquiry_alert) {
            return;
        }

        $generalSettings = GeneralSetting::first();
        $adminEmail = $generalSettings->admin_email ?? 'fitwayequipments26@gmail.com';

        self::deliver($adminEmail, $mailable);
    }

    /**
     * Send any mailable to a customer using the saved SMTP settings.
     */
    public static function sendToCustomer(string $to, Mailable $mailable): void
    {
        self::deliver($to, $mailable);
    }

    private static function deliver(string $to, Mailable $mailable): void
    {
        $smtp = SmtpSetting::first();

        if (!$smtp || empty($smtp->smtp_host) || empty($smtp->smtp_username)) {
            Log::warning('Mail not sent: SMTP settings are incomplete.');
            return;
        }

        try {
            Config::set('mail.mailers.dynamic_smtp', [
                'transport'  => 'smtp',
                'host'       => $smtp->smtp_host,
                'port'       => $smtp->smtp_port,
                'encryption' => $smtp->smtp_encryption === 'none' ? null : $smtp->smtp_encryption,
                'username'   => $smtp->smtp_username,
                'password'   => $smtp->smtp_password,
                'timeout'    => null,
            ]);

            Config::set('mail.from', [
                'address' => $smtp->from_email ?: $smtp->smtp_username,
                'name'    => $smtp->from_name ?: config('app.name'),
            ]);

            // Forget any cached mailer so the new config is actually used
            Mail::purge('dynamic_smtp');

            Mail::mailer('dynamic_smtp')->to($to)->send($mailable);
        } catch (\Throwable $e) {
            Log::error('Mail failed (' . get_class($mailable) . ' to ' . $to . '): ' . $e->getMessage());
        }
    }
}