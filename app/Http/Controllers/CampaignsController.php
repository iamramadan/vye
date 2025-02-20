<?php

namespace App\Http\Controllers;

// use App\Models\user;

use App\Models\poll;
use App\Models\User;
use App\Models\campaigns;
use Hamcrest\Description;
use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;

class CampaignsController extends Controller
{
    public $Description = ' ';
    public function uploadCampaignImage(Request $request){
        // dd($request);
        // $this->validate($request,[
        //     'name'=>'required|unique'
        //     ]);
        if ($request->description != '') $this->Description = $request->description;
        // dd($this->Description);
    if ($request->hasFile('campaign-logo')) {
        $image = $request->file('campaign-logo');
        $filename = md5($image->getClientOriginalName()).'_'.time(). '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public/files', $filename);
        session()->put('campaign_image',$filename);
        $name = $this->CreateCampaign($request);
        session()->remove('campaign_image');
        return redirect()->route('campaign.index',$name);
    }else{
        if (Auth::user()->id == 1) {
            $type = 'adminmade';
        }else{
            $type = 'usermade';
        }
        $campaign = campaigns::create([
            'name'=>$request->name,
            'creator'=>Auth::user()->id,
            'description'=>$this->Description,
            'type'=> $type,
            'campaign_logo' => 'no-image'
        ]);
        return redirect()->route('campaign.index',$campaign->name);
    }
}

        public function CreateCampaign($request){
            if (Auth::user()->id == 1) {
                $type = 'adminmade';
            }else{
                $type = 'usermade';
            }
           $campaign = campaigns::create([
                'name'=>$request->name,
                'creator'=>Auth::user()->id,
                'description'=>$this->Description,
                'type'=> $type,
                'campaign_logo' => session('campaign_image')
            ]);
            return $campaign->name;
        }
    public function CreateCampaignPage(){
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'createcampaign';
        return view('create.campaign',compact(['profile','page']));
    }
    public function campaign($name){
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $campaign = campaigns::with('poll')->where('name',$name)->get();
        $creator = User::where('id',$campaign[0]->creator)->get();
        $polls= poll::where('campaigns_id',$campaign[0]->id)->get();
        $poll_id = extractColumn($polls,'id');
        $contestants = contestants::whereIn('poll_id',$poll_id)->get();
        $contestants_id = extractColumn($contestants,'id');
        $creator = $creator[0]->username;
        $content =campaignContent::whereIn("contestants_id",$contestants_id)->orderBy('created_at','desc')->get();
        $page = 'explorecampaign';
        return view('explore.campaign',compact(['content','polls','profile','campaign','creator','page']));
    }
    public function update(request $request){
        $incomingFields = $this->validate($request,[
            'name'=>'max:40',
            'description'=>'max:225',
            'campaign_logo'=>'file'
        ]);
        if($request->hasFile('campaign_logo')){
            $incomingFields['campaign_logo'] = upload($request->campaign_logo);
        }
        // dd($incomingFields);
    $campaign = campaigns::find($request->id);
    $campaign->update($incomingFields);
            return back()->with('status','campaign updated');
    }
    public function updatepage($name){
        $campaign = campaigns::where('name',$name)->get();
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $page = 'update campaign page';
        return view('campaignadmin.updatecampaign',compact('campaign','profile','page'));
    }
    public function admin($name){
        $adminname = $name;
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $page = 'admin';
        return view('campaignadmin.index',compact(['adminname','profile','page']));
    }
    public function managepolls($name){
        $campaign = campaigns::where('name',$name)->get();
        $poll = poll::where('campaigns_id',$campaign[0]->id)->paginate(2);
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $page = 'admin manage polls';
        return view('campaignadmin.managepoll',compact(['campaign','poll','profile','page']));
    }
    public function managecontestant($campaign,$poll){
        $campaign = campaigns::where('name',$campaign)->get();
        $poll = poll::where('name',$poll)->where('campaigns_id',$campaign[0]->id)->get();
        $contestants = contestants::where('poll_id',$poll[0]->id)->paginate(20);
        $profile = user_profile::where('user_id',operator: Auth::user()->id)->get();
        $page = 'admin manage contestants';
        return view('campaignadmin.managecontestants',compact(['profile','contestants','page']));
    }
    
}
