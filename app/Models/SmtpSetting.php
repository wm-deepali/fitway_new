<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmtpSetting extends Model
{
    protected $fillable = [
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
        'from_name',
        'from_email',
        'reply_to_name',
        'reply_to_email',
        'admin_enquiry_alert',
    ];

    protected $casts = [
        'admin_enquiry_alert' => 'boolean',
    ];

    /**
     * Always return a singleton row (id = 1).
     */
    public static function getInstance(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}