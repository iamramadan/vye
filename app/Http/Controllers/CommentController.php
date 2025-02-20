<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(request $request){
           $incomingField = $this->validate($request,[
                'comment'=>'required|max:400',
                'user_id'=>'required',
                'campaign_id'=>'required'
            ]);

            comment::create($incomingField);
            return back()->with('response','comment created');
    }
}
