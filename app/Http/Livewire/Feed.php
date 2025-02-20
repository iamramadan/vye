<?php

namespace App\Http\Livewire;

use App\Models\comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Feed extends Component
{
    protected $listeners = [
        'changepage'=>'changepage'
    ];
    public $campaigncontent;
    public $page = 'home';
    public $user;
    public $campaignid;
    public $comment;
    public function mount($campaigncontent,$page){
        $this->campaigncontent = $campaigncontent;
        $this->page = $page;
    }
    public function changepage(string $page){
        $this->page = $page;
    }
    public function tomodal($id){
        $this->emit('content',$id);
        $this->emit('openmodal');
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
        return view('livewire.feed');
    }
}
