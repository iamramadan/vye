<?php

namespace App\Http\Livewire;

use App\Models\poll;
use Livewire\Component;
use Illuminate\Queue\Listener;
use App\Http\Livewire\Selectwrapper;

class Selectpoll extends Component
{

    protected $listeners = [
        'set_poll_id',
        'return'
    ];
    public $polls = [];
    public $poll_id = '';
    public $campaign_id ;

    public function mount($id)
    {
        $this->campaign_id = $id;
        $this->polls = poll::where('campaigns_id',$id)->get();
    }
    public function set_poll_id($id)
    {
        $this->poll_id = $id;
    }
    public function resetid()
    {
        $this->emit('unsetid');
    }


    public function render()
    {
        return view('livewire.selectpoll');
    }
}
