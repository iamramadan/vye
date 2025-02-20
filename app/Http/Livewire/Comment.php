<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Comment extends Component
{
    public $user;
    public $campaignid;
    public $comment;

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

        return view('livewire.comment');
    }
}
