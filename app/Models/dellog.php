<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dellog extends Model
{
    protected $fillable =[
        'deleted_poll',
        'campaign'
    ];
    use HasFactory;
}
