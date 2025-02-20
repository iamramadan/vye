<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Campaignpage extends Component
{
    protected $listeners = [
        'polls',
        'recent'
    ];
    public $campaign;
    public $creator;
    public $display = 'recent';
    public $polls;
    public $content;

    public function mount($campaign,$creator,$polls,$content){
        $campaign = $this->campaign;
        $creator = $this->creator;
        $polls= $this->polls;
        $content = $this->content;
    }
    public function polls(){
        $this->display = 'polls';
    }
    public function details(){
        $this->display = 'details';
    }
    public function recent(){
        $this->display = 'recent';
    }
    public function foryou(){
        $this->display = 'for you';
    }
    public function render()
    {
        return view('livewire.campaignpage');
    }
}
