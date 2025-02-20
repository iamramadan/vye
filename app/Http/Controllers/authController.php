<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }
    public function signin(){
        return view('auth.signin');
    }
    public function resetpassword( request $request){
          $incomingFeilds = $this->validate($request,[
            'email'=>'required|email',
            'username'=>'required|max:255',
            'new-password'=>'required|min:8',
            'password'=>'required|min:8'
          ]);
          $msg = 'Password or username is wrong!.Could not successfully edit  credentials';
          if(Auth::user()->email == $request->email && Hash::check($request->password,Auth::user()->passowrd)){
            array_pop($incomingFeilds);
           $user = user::find(Auth::user()->id);
           $user->update($incomingFeilds);
           $msg = 'edited credentials successfully';
          }
        return back()->with('status',$msg);
  }
 public function signupstore(request $request){
        // dd($request);
       $incomingfeild = $this->validate($request,[
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
       ]);
       $incomingfeild['password'] = Hash::make($request->password);
       User::create($incomingfeild);
      $auth = Auth::attempt($request->only('email','password'));
      if($auth){
        return redirect()->route('index');
      }
    }
    public function signinstore(request $request){
        $this->validate($request ,[
             'email' => 'required|email',
             'password' => 'required|min:8'
        ]);
       $auth = Auth::attempt($request->only('email','password'));
       if($auth){
         return redirect()->route('index');
       }else{
        return redirect()->back()->with('error','Incorrect username or password');
       }
     }
     public function logout(){
        auth()->logout();
        return redirect()->route('sign-in');
     }
}
