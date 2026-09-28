<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    const STATUS_NEW           = 1;
    const STATUS_UNDER_PROCESS = 2;
    const STATUS_COMPLETED     = 3;

    public static array $statusLabels = [
        self::STATUS_NEW           => 'New Complaint',
        self::STATUS_UNDER_PROCESS => 'Under Process',
        self::STATUS_COMPLETED     => 'Completed',
    ];

    public static array $statusBadgeClasses = [
        self::STATUS_NEW           => 'badge-warning',
        self::STATUS_UNDER_PROCESS => 'badge-info',
        self::STATUS_COMPLETED     => 'badge-success',
    ];

    protected $fillable = [
        'complaint_code', 'customer_id', 'customer_name', 'email', 'mobile_number',
        'full_address', 'landmark', 'state_id', 'city_id', 'pin_code', 'complaint_detail',
        'complaint_type', 'service_detail', 'paid_price', 'technician_id', 'schedule_date',
        'status', 'source',
    ];

    protected $casts = [
        'status'        => 'integer',
        'paid_price'    => 'decimal:2',
        'schedule_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Complaint $complaint) {
            if (empty($complaint->complaint_code)) {
                $complaint->complaint_code = self::generateComplaintCode();
            }
        });
    }

    public static function generateComplaintCode(): string
    {
        do {
            $next = (self::max('id') ?? 0) + 1;
            $code = 'CMP' . str_pad($next, 4, '0', STR_PAD_LEFT);
        } while (self::where('complaint_code', $code)->exists());

        return $code;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::$statusLabels[$this->status] ?? 'Unknown';
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return self::$statusBadgeClasses[$this->status] ?? 'badge-secondary';
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function images()
    {
        return $this->hasMany(ComplaintImage::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}