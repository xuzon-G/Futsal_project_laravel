<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
    	return view('Authentication.forgotPassword');
    }
    public function postForgotPassword(Request $request)
    {
    	return $request->email;
    }
}
