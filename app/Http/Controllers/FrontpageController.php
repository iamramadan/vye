<?php

namespace App\Http\Controllers;

use App\Models\poll;
use App\Models\User;
use App\Models\campaigns;
use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;

class FrontpageController extends Controller
{
    public function index(){
        if(Auth::check()){
            $page = 'home';
            $campaigncontent = campaignContent::orderBy('created_at','desc')->get();
            $profile = user_profile::where('user_id',Auth::user()->id)->get();
            return view('index', compact(['campaigncontent','profile','page']));
        }
        return view('index');
    }
    public function campaign(){
        $page = 'campaign';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $foryou = campaigns::with('poll')->orderBy('created_at','desc')->paginate(10);
        return view('pages.campaign',compact(['profile','foryou','page']));
    }
    public function trending(){
        $page = 'trending';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        return view('pages.trending',compact(['page','profile']));
    }
    public function explore(){
        $page = 'explore';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        return view('pages.explore',compact(['page','profile']));
    }
    public function setting(){
        $page = 'settings';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        return view('pages.setting',compact(['page','profile']));
    }
    public function notification(){
        $page = 'notification';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        return view('pages.notification',compact(['page','profile']));
    }
    public function activity(){
        $page = 'activity';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        return view('pages.activity',compact(['page','profile']));
    }
    public function feed($thepage,$name){
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = $thepage.'feed';
        switch ($thepage) {
            case 'profile':
                $user = User::where('username',$name)->get('id');
                $contestant = extractColumn(contestants::where('user_id',$user[0]->id)->get(),'id');
                $content = campaignContent::whereIn('contestants_id',$contestant)->orderBy('created_at','desc')->get();
                break;
            case 'campaign':
                $campaign = campaigns::where('name',$name)->get();
                $poll = extractColumn(poll::where('campaign_id',$campaign[0]->id)->get(),'id');
                $contestant = extractColumn(contestants::whereIn('poll_id',$poll)->get(),'id');
                $content = campaignContent::whereIn('contestants_id',$contestant)->get();
                break;
        }
        // dd($page);
        return view('feed.index',compact(['content','page','profile']));
    }

}
