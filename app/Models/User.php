<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'birth',
        'sexe',
        'email',
        'phone_number',
        'sector',
        'motivation',
        'objectif',
        'online',
        'achieved',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function interships() : HasMany
    {
        return $this->hasMany(Intership::class);
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getName()
    {
        return $this->last_name . " " . $this->first_name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
