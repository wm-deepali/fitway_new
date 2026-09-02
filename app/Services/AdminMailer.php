<?php

namespace App\Services;

use App\Mail\AdminEnquiryAlert;
use App\Models\SmtpSetting;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminMailer
{
    /**
     * @param string $formName e.g. "Contact Us Form"
     * @param array  $fields   key => value pairs to display in the email
     */
    public static function sendEnquiryAlert(string $formName, array $fields): void
    {
        $smtp = SmtpSetting::first();

        if (!$smtp || !$smtp->admin_enquiry_alert) {
            return;
        }

        if (empty($smtp->smtp_host) || empty($smtp->smtp_username)) {
            return;
        }

        try {
            Config::set('mail.mailers.dynamic_smtp', [
                'transport' => 'smtp',
                'host' => $smtp->smtp_host,
                'port' => $smtp->smtp_port,
                'encryption' => $smtp->smtp_encryption === 'none' ? null : $smtp->smtp_encryption,
                'username' => $smtp->smtp_username,
                'password' => $smtp->smtp_password,
                'timeout' => null,
            ]);

            Config::set('mail.from', [
                'address' => $smtp->from_email ?: $smtp->smtp_username,
                'name' => $smtp->from_name ?: config('app.name'),
            ]);

            $generalSettings = GeneralSetting::first();

            Mail::mailer('dynamic_smtp')
                ->to($generalSettings->admin_email ?? 'fitwayequipments26@gmail.com')
                ->send(new AdminEnquiryAlert($formName, $fields));
        } catch (\Throwable $e) {
            Log::error('Admin enquiry alert mail failed: ' . $e->getMessage());
        }
    }
}