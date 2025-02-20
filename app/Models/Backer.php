<?php

namespace App\Models;
use App\Models\User;
use App\Models\contestants;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Backer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contestant_id'
    ];

    public function User(){
      return  $this->belongsTo(User::class);
    }
    public function contestants(){
      return  $this->belongsTo(contestants::class);
    }
}
