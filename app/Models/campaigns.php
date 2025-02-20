<?php

namespace App\Models;

use App\Models\poll;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\campaignPromationContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class campaigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator',
        'name',
        'description',
        'type',
        "campaign_logo"
    ];
    public function poll(){
        return $this->hasMany(poll::class);
    }
    public function campaignPromationContent(){
       return $this->hasMany(campaignPromationContent::class);
    }
    public function User(){
       return $this->belongsTo(User::class);
    }
}
