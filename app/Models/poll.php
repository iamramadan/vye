<?php

namespace App\Models;
use App\Models\campaigns;
use App\Models\contestants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'campaigns_id',
        'poll_type'
    ];
    public function campaigns(){
    return $this->belongsTo(campaigns::class);
    }
    public function contestants(){
     return $this->hasMany(contestants::class);
    }
}
