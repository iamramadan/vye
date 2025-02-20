<?php

namespace App\Models;
use App\Models\campaigns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class campaignPromationContent extends Model
{
    use HasFactory;
    public function campaigns(){
       return $this->hasMany(campaigns::class);
    }
}
