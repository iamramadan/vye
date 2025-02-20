<?php

namespace App\Http\Livewire;

use App\Models\poll;
use Livewire\Component;
use App\Models\campaigns;
use App\Models\contestants;
use Illuminate\Support\Facades\Auth;
class Selectwrapper extends Component
{
    public $identifier = 0;

    protected $listeners = [
        // 'increment',
        // 'activity',
        // 'created',
        // 'all',
        'setid',
        'unsetid'
    ];
public $campaign;

public function mount()
{
    $this->campaign =  campaigns::where('creator',Auth::user()->id)->get();
}
public function activity()
{
       $this->campaign = campaigns::where('id',1)->get();
}
public function created()
{
    $this->campaign =  campaigns::where('creator',Auth::user()->id)->get();
}
    public function setid($identifier){
        $this->identifier = $identifier;
    }

    public function unsetid(){
        $this->identifier = 0;
    }
    public function render()
    {
        // if ($this->identifier == 0) {
        //     return view('livewire.selectpoll');
        // }else {
        // }
        return view('livewire.selectwrapper');
    }
}
