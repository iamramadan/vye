<?php

namespace App\Http\Controllers;

use App\Models\poll;
use App\Models\campaigns;
use App\Models\contestants;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;

class CampaignContentController extends Controller
{

    public function index($name){
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'createcampaigncontent';
        $name = str_replace('-',' ',$name);
        $campaign = campaigns::where('name','=',$name)->get('id');
        $id = $campaign[0]->id;
        $poll = poll::where('campaigns_id',$id)->get();
        $polls = extractColumn($poll,'name');
        return view('create.campaigncontent',compact(['profile','page','id','polls']));
    }
    public function createpostfrompage(request $request){
        // dd($request);
           $incomingFields =  $this->validate($request,[
                'image'=>'required|file',
                'description'=> 'required|max:255',
                'campaign_id' => 'required',
                'poll'=> 'required'
            ]);
           $filename = upload($request->image);
           $poll= extractColumn(poll::where('name',$incomingFields['poll'])->where('campaigns_id',$incomingFields['campaign_id'])->get('id'),'id');
           $contestant = contestants::where('poll_id',$poll[0])->where('user_id',Auth::user()->id)->get();
           $thereiscontestant = contestants::where('user_id',operator: Auth::user()->id)->where('poll_id',$poll[0])->get();
           if(count($thereiscontestant) == 0){
               $contestant = contestants::create([
                        'user_id'=>Auth::user()->id,
                        'poll_id'=> $poll[0]
                ]);
               campaignContent::create([
                   'description'=> $incomingFields['description'],
                   'fileName'=>$filename,
                   'contestants_id'=>$contestant->id
               ]);
           }else{
            campaignContent::create([
                'description'=> $incomingFields['description'],
                'fileName'=>$filename,
                'contestants_id'=>$contestant[0]->id
            ]);
           }

            return back()->with('status','post created');
    }
    public function store(){
        // $this->validate($request,[
        //     'image' => 'required|file',
        //     'description' => 'required'
        // ]);
        // $filename = upload($request->image);
        // session()->put('post',$filename);
        // session()->put('description',$request->description);
        $campaign = campaigns::all();
        $profile = user_profile::where('user_id',Auth::user()->id)->get();
        $page = 'selectcampaign';
        return view('select.campaign',compact(['profile','page']));
    }
    public function completepost(Request $request){
        // dd($request);
        $request->validate([
            'image'=>'required|file|max:102400'
        ]);
        $filename = upload($request->image);
        
        $contestant = contestants::where('user_id',operator: Auth::user()->id)->where('poll_id',$request->poll_id)->get();
        if (count($contestant) == 0) {
           $contestant = contestants::create([
                'user_id' => Auth::user()->id,
                'poll_id' => $request->poll_id
            ]);
            campaignContent::create([
                'fileName'=> $filename,
                'description'=> $request->description,
                'contestants_id' => $contestant->id
            ]);
        }else{
            campaignContent::create([
                'fileName'=> $filename,
                'description'=> $request->description,
                'contestants_id' => $contestant[0]->id
            ]);
        }
        return redirect()->route('index');
    }
}
