<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\User;
use App\Models\campaigns;
use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index(){
        $page = 'profile';
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $campaigns = campaigns::where('creator',Auth::user()->id)->get();
        $contestant = contestants::where('user_id',Auth::user()->id)->get('id');
        if(count($contestant) > 1){

            $i = 0;
            foreach ($contestant as $con){
                $i++;
                $contestant_id[$i] = $con->id;
            }
            $content = campaignContent::whereIn('contestants_id',$contestant_id)->orderBy('created_at','desc')->get();
        }else{
            $content = [];
        }
        // dd($content);
        return view('profile.index',compact(['profile','content','page','campaigns']));
    }
    public function storeProfileImage(request $request){
        if ($request->hasFile('profile_image')) {
            $file = upload($request->file('profile_image'));
            session()->put('profile_image',$file);
            $this->store($request);
            session()->remove('profile_image');
            return back();
        }else{
            $profile = user_profile::where('user_id',Auth::user()->id)->get();
            $user = user_profile::find($profile[0]->id);
            if (count($profile) > 0) {
                # code...
                $user->update([
                    'bio'=>$request->bio
                ]);
            }else{
                user_profile::create([
                    'profile_image'=>'no-image',
                    'bio'=>$request->bio,
                    'user_id'=>Auth::user()->id,
                    'story'=>'none'
        ]);
            }
            return back();
        }
    }
    public function store($request){
        $this->validate($request,[
            'bio'=>'max:255',
        ]);
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        if (count($profile) > 0) {
            $user = user_profile::find($profile[0]->id);
            if($request->bio == '') {
                $user->update([
                    'profile_image'=>session('profile_image'),
                ]);
            }else{
                $user->update([
                    'profile_image'=>session('profile_image'),
                    'bio'=>$request->bio,
                ]);
            }
        }else{
            $this->validate($request,[
                'bio'=>'max:225'
            ]);
            user_profile::create([
                        'profile_image'=>session('profile_image'),
                        'bio'=>$request->bio,
                        'user_id'=>Auth::user()->id,
                        'story'=>'none'
            ]);
        }
    }
    public function findprofile($name){
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $usersprofile = User::with('user_profile')->where('username',$name)->get();
        dd($usersprofile);
    }
}
