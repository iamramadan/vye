<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profiledisplay extends Component
{
    public $content;
    public $campaign;
    public $show = 'post';
    public function show($show){
        $this->show = $show;
    }
    public function mount($content,$campaign){
        $this->content = $content;
        $this->campaign = $campaign;
    }

    public function render()
    {
        return view('livewire.profiledisplay');
    }
}
