<?php

namespace App\Models;

// use App\Models;
use App\Models\poll;
use App\Models\User;
use App\Models\Backer;
use App\Models\campaignContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class contestants extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'poll_id'
    ];
    public function User(){
       return $this->belongsTo(user::class);
    }
    public function poll(){
       return $this->belongsTo(poll::class);
    }
    public function campaignContent(){
      return $this->hasMany(campaignContent::class);
    }
    public function Backer(){
      return  $this->hasMany(Backer::class);
    }
    public function canvas(){
      return  $this->hasMany(canvas::class);
    }
}
