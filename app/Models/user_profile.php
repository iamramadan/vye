<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_image',
        'bio',
        'user_id',
        'story'
    ];
    public function User(){
        $this->belongsTo(User::class);
    }
}
