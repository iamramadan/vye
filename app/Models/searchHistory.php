<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class searchHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'search'
    ];

    public function User(){
       return $this->belongsTo(User::class);
    }
}
