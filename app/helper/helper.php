<?php

use App\Models\poll;
use App\Models\User;
use App\Models\Backer;
use App\Models\campaigns;
use app\algorithm\campaign;
use App\Models\contestants;
use App\Models\user_profile;
// use Symfony\Component\HttpKernel\Profiler\Profile;


function upload($file){
    $filename = md5($file->getClientOriginalName()).'_'.time(). '.' .$file->getClientOriginalExtension();
    $file->storeAs('/public/files', $filename);
    return $filename;
}
function extractColumn($array,string $column){
    $polls = [];
    $i = 0;
    foreach ($array as $c) {
        $polls[$i] = $c->$column;
        $i++;
    }
    return $polls;
}
function findcampaign($id){
    $poll = extractColumn(contestants::where('id',$id)->get(),'poll_id');
    $campaign = extractColumn(poll::where('id',$poll[0])->get(),'campaigns_id');
    return $campaign[0];
}
function getvalue($id,$column,$table='user'){
    $contestant = contestants::where('id',$id)->get();
    $user = User::where('id',$contestant[0]->user_id)->get();
    $profile = user_profile::where('user_id',$contestant[0]->user_id)->get();
    switch ($table) {
        case 'user':
            return $user[0]->$column;
        break;
        case 'profile':
            return $profile[0]->$column;
    }
}
function contestant($id,$column){
    $contestant = contestants::where('id',$id)->get();
    $user =  user::where('id',$contestant[0]->user_id)->get();
    return $user[0]->$column;
}

function backercount($id){
    return Backer::where('contestant_id',$id)->count();
}

function getcampaignsandpoll($id){
    $poll = poll::where('id',$id)->get();
    $campaign = campaigns::where('id',$poll[0]->campaigns_id)->get();
    // dd($poll[0]->name);
    return [0 =>$campaign[0]->name,1 => $poll[0]->name ];
}

function fromtrash($id,$column){
    // dd($id);
    $trashed_poll = poll::where('campaigns_id',6)->get();
    // dd($trashed_poll);
    // session::flash();
    return $trashed_poll[0]->$column;
}
