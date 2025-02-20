<?php

namespace App\Http\Livewire;

use App\Models\comment;
use Livewire\Component;
use App\Models\campaignContent;
use Illuminate\Support\Facades\Auth;


class Feedmodal extends Component
{
    protected $listeners = ['content' => 'setcontent','openmodal'=>'open'];
    public $user;
    public $campaignid;
    public $comment;
    public $content = [];
    public $open = 'false';

    public function setcontent($id){
        $data = campaignContent::where('id',$id)->get();
        // dd($data);
        $this->content = $data;
    }
    public function open(){
        $this->open = 'true';
    }

    public function createcomment($id){
        // die(Auth::user()->id);
            $this->campaignid = $id;
            $this->user = Auth::user()->id;
            comment::create(['user_id'=>$this->user,'campaign_id'=>$this->campaignid,'comment'=>$this->comment]);
            // $this->banner('Comment Posted.');
            $this->comment = '';
        }
    public function render()
    {
        return view('livewire.feedmodal');
    }
}
