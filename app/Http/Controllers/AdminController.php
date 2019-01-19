<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Sentinel;
use App\availableTime;
class AdminController extends Controller
{
   public function showDashBoard()
   {
      //showing the admin Dashboard Page
   	return view('Admins.AdminDashBoard');
   }
   
   public function showBookings(Request $request)

   {  $total=0;

   	if($request->datecal)
   	{ 
   			$books=Bookings::where('date',$request->datecal)->get();

            $date=$request->datecal;
            foreach ($books as  $book) {
               $total=$total+$book->price;
            }
   			   	return view('Admins.viewBookings',compact('books','date','total'));
   	}
   	else{
	   $books=Bookings::all();
       foreach ($books as  $book) {
               $total=$total+$book->price;
            }
       $date='';
   	return view('Admins.viewBookings',compact('books','date','total'));
   }
   }

 

   public function viewAdmin()
   {
       $role = Sentinel::findRoleBySlug('Admin');
         $id=Sentinel::getUser()->id;
      $users=$role->users()->with('roles')->get();
      if($users->isNotEmpty()){
      $roles = Sentinel::findById($id)->roles;
      $roletype= $roles[0]->name;
    
      return view('Admins.viewAdmins',compact('users','roletype'));
      }
       else
      {
      return view('Admins.viewAdmins',compact('users'));
      }
      

   }
// Show Users and Delete Users part in Admin panel
  public function showUsers()
   {
         $role = Sentinel::findRoleBySlug('Client');
         $id=Sentinel::getUser()->id;
      $users=$role->users()->with('roles')->get();
      if($users->isNotEmpty()){
      $roles = Sentinel::findRoleBySlug('Client')->get();
      
      $roletype= $roles[1]->name;
    
      return view('Admins.viewUsers',compact('users','roletype'));
   }
   else
   {
      return view('Admins.viewUsers',compact('users'));
   }
   }
   public function destroyUser($id)
   {
      $user = Sentinel::findById($id);
   
      $user->delete();
      return redirect('/Users');
   }
 
   public function bookNowAdmin()
  {
  return view('Admins.bookNowAdmin');

  }
public function viewBookTimeAdmin(Request $request)

{
   $bookedTime='';
    $availableTime=availableTime::all();


    $booking=Bookings::where('date',$_REQUEST["datecal"])->get();
   
     return view('Admins.adminBooking',compact('booking','availableTime'));  
   }

   public function postBookNowAdmin(Request $request)
   {
       $mail = $request->get('hiddenMail')."( ".$request->get('hiddenrole').")";
        $mail;
    
      $booking=new Bookings;
       $booking->email=$mail;
       $booking->date=$request->popupDate;
      $booking->time=$request->time;
      $booking->phone=$request->get('hiddenrole');
       $booking->price=$request->price;
        
       $booking->save();
       return redirect('/viewBooking');
   }
   
   public function destroyBooking($id)
   {  $destroybook=Bookings::where('id',$id)->delete();
      return redirect('/viewBooking');
   }

   public function destroyAdmin($id)
   {
   $user = Sentinel::find($id);
   
   $user->delete();
    
      
         return redirect('/viewAdmin');
   }

}
