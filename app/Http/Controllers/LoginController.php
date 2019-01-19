<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
   public function login()
   {
   	return view('Authentication.login');
   }
   public function postlogin(Request $request)
   {

      $this->validation($request);
   
     try{
      $rememberMe=false;
        if(isset($request->remember_me))
         $rememberMe=true;

       if (Sentinel::authenticate($request->all(),$rememberMe)) {
         $slug=Sentinel::getUser()->roles()->first()->slug;
      if($slug=='admin')
         return redirect('/Admin_dashboard');
      elseif ($slug=='client')
         return redirect('/Client_dashboard');

      } else {
         return redirect()->back()->with(['error'=>'Username or Password is Incorrect']);
      }
      
     }
     catch( \Cartalyst\Sentinel\Checkpoints\ThrottlingException $e){
         $delay=$e->getDelay();
         return redirect()->back()->with(['error'=>"Too much attempt please try after $delay second"]);
     }

    
   }
 
   
   public function logout()
   {
 Sentinel::logout(null, true);
   	return redirect('/');
   }
   public function validation($request)
   {
      $request->validate([
   
        'email' => 'required|max:255',
   
         ]);
   }
}
