<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Backer;
use App\Models\comment;
use App\Models\contestants;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

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

    public function campaigns(){
       return $this->hasMany(campaigns::class);
    }
    public function comment(){
       return $this->hasMany(comment::class);
    }
    public function Backer(){
       return $this->hasMany(Backer::class);
    }
    public function contestants(){
        return $this->hasMany(contestants::class);
    }
    public function canvas(){
        return $this->hasMany(canvas::class);
    }
}
