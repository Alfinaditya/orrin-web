<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
    ];

    public function categories()
    {
        return $this->hasMany(Categories::class, 'id', 'user_id');
    }

    public function mens()
    {
        return $this->hasMany(MensParfume::class);
    }

    public function womens()
    {
        return $this->hasMany(WomensParfume::class);
    }

    public function sweets()
    {
        return $this->hasMany(SweetsParfume::class);
    }

    public function casuals()
    {
        return $this->hasMany(CasualsParfume::class);
    }
}