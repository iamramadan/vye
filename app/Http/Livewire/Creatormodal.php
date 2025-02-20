<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Creatormodal extends Component
{
    protected $listeners = [
        'open',
        'close'
    ];
    public $status = 'open';
    public function close()
    {
        $this->status = 'close';
    }
    public function render()
    {
        return view('livewire.creatormodal');
    }
}
