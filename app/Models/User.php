<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $with = ['role', 'membership'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'image',
        'balance',
        'active',
        'membership_id',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function lends()
    {
        return $this->hasMany(Lend::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function scopePrimaryAddress()
    {
        return $this->addresses()->where('is_primary', true)->first();
    }
}
