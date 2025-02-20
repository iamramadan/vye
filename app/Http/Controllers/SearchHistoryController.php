<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\searchHistory;
use Illuminate\Support\Facades\Auth;

class SearchHistoryController extends Controller
{
    public static function store($search){
        searchHistory::create(['search'=>$search,'user_id'=>Auth::user()->id]);
    }
}
