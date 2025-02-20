<?php

namespace App\Models;

use App\Models\contestants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class campaignContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'fileName',
        'description',
        'contestants_id'
     ];
    public function contestants(){
      return  $this->belongsTo(contestants::class);
    }
}
