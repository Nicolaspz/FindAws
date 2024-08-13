<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Property;

class User extends Authenticatable  implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_USER = 'ADMIN';
    const ROLE_COLABORATE = 'COLABORATE';
    const ROLE_SUPER = 'SUPER_ADMIN';

    const ROLE_DEFAULT = self::ROLE_COLABORATE;
    const ROLES = [
        self::ROLE_USER => 'Admin',
        self::ROLE_COLABORATE => 'Colaborate',
        self::ROLE_SUPER => 'Super_admin',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status',
        'phone_verification_code',
        'phone_verified',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->role = $user->role ?? self::ROLE_DEFAULT;
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === self::ROLE_USER || $this->role === self::ROLE_COLABORATE;
    }



    public function isAdmin()
    {
        return $this->role === self::ROLE_USER;
    }
    public function isSupAdmin()
    {
        return $this->role === self::ROLE_SUPER;
    }

    public function isEditor()
    {
        return $this->role === self::ROLE_COLABORATE;
    }


}
