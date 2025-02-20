<?php

namespace App\Http\Livewire;

use App\Models\Backer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Contestants extends Component
{
    public $contestant;
    public $votes;
    // dd($this->contestant);
    public function mount($contestant){
        $contestant = $this->contestant;
        $this->votes = Backer::where('user_id',Auth::user()->id)->where('contestant_id',$this->contestant->id)->count();
    }


    public function back($id,$contestant_id){
        $back = Backer::where('user_id',$id)->where('contestant_id',$contestant_id)->get();
        if(count($back) == 0){
            Backer::create([
                'user_id' => $id,
                'contestant_id' => $contestant_id
            ]);
        $this->votes = Backer::where('user_id',$id)->where('contestant_id',$contestant_id)->count();
        }else{
            $back = Backer::find($back[0]->id);
            $back->delete();
            $this->votes = Backer::where('user_id',$id)->where('contestant_id',$contestant_id)->count();
        }
    }

    public function render()
    {
        return view('livewire.contestants');
    }
}
