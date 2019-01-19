<?php

Route::group(['middleware'=>'visitors'],function(){



Route::get('/register','RegistrationController@register');
Route::post('/register','RegistrationController@postregister');
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postlogin');





});
//Authentication Controllers
Route::get('/Client_dashboard','ClientController@showClientDashBoard')->middleware('client');
Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');
Route::post('/logout','LoginController@logout');
Route::get('/activate/{email}/{activationCode}','activationController@activate');
// Authentication controllers end

Route::get('/', function () {
	if(Sentinel::check())
	{
		  $slug=Sentinel::getUser()->roles()->first()->slug;
   
        if($slug=='admin')
         return redirect('/Admin_dashboard');
      elseif ($slug=='client')
         return redirect('/Client_dashboard');
	}
    else 
    	return view('welcome');
});

//Client Side Routes starts here
Route::group(['middleware'=>'client'],function(){
Route::get('/bookNow','ClientController@bookNow' );
Route::post('/bookNow','ClientController@postBook');
Route::get('/myBooking','ClientController@myBooking');
Route::get('/availableTime','ClientController@viewTime');
Route::delete('/myBooking/{id}','ClientController@destroyMyBooking');
Route::get('/changePassword','ClientController@showchangePassword');
Route::post('/changePassword','ClientController@changePassword');

});
//Client Side Routes ends

//Admin Side Routes start here
Route::group(['middleware'=>'admin'],function(){
Route::get('/Admin_dashboard','AdminController@showDashBoard');
Route::get('/viewBooking','AdminController@showBookings');
Route::get('/addAdmin','AddAdminController@showaddAdmins');
Route::post('/addAdmin','AddAdminController@addAdmin');
Route::get('/Users','AdminController@showUsers');
Route::delete('/Users/{id}','AdminController@destroyUser');
Route::get('/viewAdmin','AdminController@viewAdmin');
Route::get('/bookNowAdmin','AdminController@bookNowAdmin' );

Route::post('/bookNowAdmin','AdminController@postBookNowAdmin');
Route::get('/adminBooking','AdminController@viewBookTimeAdmin');
Route::delete('/viewBooking/{id}','AdminController@destroyBooking');
Route::delete('/viewAdmin/{id}','AdminController@destroyAdmin');
});