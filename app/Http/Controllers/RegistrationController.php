<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;
class RegistrationController extends Controller
{
    public function register()
    {
    	return view('Authentication.register');
    }
    public function postregister(Request $request)
   	{	$this->validation($request);
    	$user=Sentinel::register($request->all());
		$activation=Activation::create($user);

    	$role=Sentinel::findRoleBySlug('Client');

    	$role->users()->attach($user);
    	$this->sendEmail($user,$activation->code);
    	return redirect('/login');
    
    }
    public function validation($request)
    {

    	$request->validate([
    	'password' => 'required|confirmed|max:255',
    	  'email' => 'required|email|unique:users|max:255',
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
   
			]);
    }
    private function sendEmail($user,$code)
    {
    	Mail::send('Emails.activation',[
    		'user'=>$user,
    		'code'=>$code,
    ],function($message)use($user){
    	$message->to($user->email);
    	$message->subject("Hello $user->first_name,activate your account");

    });
    }
}
