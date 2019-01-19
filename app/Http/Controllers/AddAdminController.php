<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class AddAdminController extends Controller
{
      public function showaddAdmins()
   {
 
         return view('Admins.AddAdmin');
   }
       public function addAdmin(Request $request)
   {
        $this->validation($request);
        $user=Sentinel::registerAndActivate($request->all());
        $role=Sentinel::findRoleBySlug('Admin');
        $role->users()->attach($user);//attach the user that is registered into the role of admin
        return redirect('/Admin_dashboard');

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
    
}
