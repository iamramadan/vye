<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\campaigns;
use App\Models\user_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchHistoryController;

class searchController extends Controller
{
    public function search(request $request){
        // dd($request);
        // ->orWhere('description','like',$request->keyword)
        $keyword = $request->keyword;
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $campaigns = campaigns::where('name','like','%'.$request->keyword.'%')->get();
        $user = User::where('username','like','%'.$request->keyword.'%')->get();
        $page = 'searchresult';
        SearchHistoryController::store($keyword);
        return view('search.searchresult',compact(['keyword','profile','campaigns','user','page']));
    }
}
