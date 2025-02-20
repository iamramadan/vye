<?php

namespace App\Models;
use App\Models\User;
use App\Models\campaigns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'campaign_id'
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }
    public function campaign(){
       return $this->belongsTo(campaigns::class);
    }
}
