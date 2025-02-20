<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Frontpage extends Component
{
    // public function navigate($page){
    //     $this->emit("changepage",$page);
    // }
    public $page;
    public function mount($page){
        $this->page = $page;
    }
    public function render()
    {
        return view('livewire.frontpage');
    }
}
