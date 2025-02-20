<?php

namespace App\Http\Controllers;

use App\Models\dellog;
use Illuminate\Http\Request;

class DellogController extends Controller
{
    public static function getbycampaign($id){
        return dellog::where('campaign',$id)->get('deleted_poll');
    }
}
