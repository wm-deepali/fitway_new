<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'contact',
        'image',
        'whatsapp_number',
        'address',
        'status',
        'is_sub_admin',
        'permissions',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'status'            => 'boolean',
            'is_sub_admin'      => 'boolean',
            'permissions'       => 'array',
        ];
    }

    public function scopeSubAdmins($query)
    {
        return $query->where('is_sub_admin', true);
    }

    public function isSuperAdmin(): bool
    {
        return ! $this->is_sub_admin;
    }

    /**
     * hasPermission('gym_equipments', 'products', 'edit')
     * hasPermission('dashboard', null, 'view')
     */
    public function hasPermission(string $module, ?string $item = null, string $action = 'view'): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        $key = $item ? "{$module}.{$item}.{$action}" : "{$module}.{$action}";

        return (bool) data_get($this->permissions ?? [], $key, false);
    }
}