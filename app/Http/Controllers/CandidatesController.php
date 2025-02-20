<?php

namespace App\Http\Controllers;

use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;

class CandidatesController extends Controller
{
    public function index($id){
        $contestant = contestants::with('campaigncontent')->where('id',$id)->get();
        // $content = campaignContent::where('contestants_id',$id)->get();
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $page = 'profile';
        return view('explore.contestantprofile',compact('contestant','profile','page'));
    }
}
