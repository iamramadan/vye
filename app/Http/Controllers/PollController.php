<?php

namespace App\Http\Controllers;

use App\Models\poll;
use App\Models\dellog;
use App\Models\campaigns;
use app\algorithm\campaign;
use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Http\DellogControllers as log;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function index($campaign,$name){
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'polls';
        $campaign = campaigns::where('name',$campaign)->get('id');
        // dd($campaign);
        $poll = poll::where('campaigns_id',$campaign[0]->id)->where('name',$name)->get();
        // dd($poll);
        $contestants = contestants::where('poll_id',$poll[0]->id)->get();
        return view('explore.poll' ,compact(['profile','page','poll','contestants']));
    }
    public function store(Request $request,$id){
        // dd($request);
            $incomingFeilds = $this->validate($request,[
                    'name'=>'required|max:255',
                    'about'=>'max:255',
                    'poll_type'=>'required'
            ]);
            if(poll::where('name',$request->name)->where('campaigns_id',$id)->count() == 0){
                $incomingFeilds['campaigns_id'] = $id;
                if ($request->about == '') $incomingFeilds['about'] = 'no description added';
                poll::create($incomingFeilds);
                return back();
            }
        return back()->with('error','poll with name already exists');
    }
    public function updatepage($campaign,$poll){
        $campaign = campaigns::where('name',$campaign)->get('id');
        $poll = poll::where('campaigns_id',$campaign[0]->id)->where('name',$poll)->get();
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'polls';
        return view('campaignadmin.updatepoll',compact(['campaign','poll','profile','page']));
    }
    public function update(request $request){
        // dd($request);
        $incomingFeilds = $this->validate($request,[
            'name'=>'max:200',
            'about'=>'max:1000',
            'campaign_id'=>'max:30',
            'poll_id'=> 'required'
        ]);
        array_pop($incomingFeilds);
        $poll= poll::find($request->poll_id);
        $poll->update($incomingFeilds);
        return back()->with('message','poll successfully updated');
    }
    public function trash(Request $request){
            $incomingFeilds = $this->validate($request,[
                    'id'=>'required|max:255',
            ]);
            $poll = poll::where('id',$request->id)->get();
            dellog::create([
                'deleted_poll'=>$poll[0]->id,
                'campaign'=>$poll[0]->campaigns_id
            ]);
            $poll = poll::find($poll[0]->id);
            $poll->update([
                'campaigns_id'=> 6,
            ]);
            return back()->with('status','poll deleted');
    }
    public function retrievepollspage($name){
        $campaign = campaigns::where('name',$name)->get();
        $c = new DellogController;
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'retrieve poll page';
       $polls = $c::getbycampaign($campaign[0]->id);
       return view('campaignadmin.retrievepoll',compact(['profile','page','polls','campaign']));
    }
    public function retrievepoll(request $request){
        // dd($request);
        $request->validate([
            'campaigns_id'=>'required',
            'poll_id'=>'required'
        ]);
        $poll = poll::find($request->poll_id);
        $d = dellog::where('deleted_poll',$request->poll_id)->get();
        $dellog = dellog::find($d[0]->id);
        $dellog->delete();
        $poll->update([
            'campaigns_id'=>$request->campaigns_id
        ]);
        return back()->with('status','poll retrieved');
    }
}
