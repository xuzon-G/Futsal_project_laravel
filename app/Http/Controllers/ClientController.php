<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\validphone;
use App\Bookings;
use Sentinel;
use App\availableTime;
use Hash;

class ClientController extends Controller
{
   public function showClientDashBoard()
   {
   	return view('Clients.ClientDashBoard');
   }

    public function bookNow()
  {/*
  $booking= Bookings::where('date',"2018-08-19");
  $num=$booking->count();
  dd($num);*/
  return view('Clients.bookNow');

  }

   public function postBook(Request $request)
   {
      
        $mail = $request->get('hiddenMail');
        $mail;
       
    
      $booking=new Bookings;
       $booking->email=$mail;
       $booking->date=$request->popupDate;
      $booking->time=$request->time;
      $booking->phone=$request->phone;
       $booking->price=$request->price;
        
       $booking->save();
       return redirect('/myBooking');

    }
   public function myBooking()
   {

      $books=Bookings::where('email',Sentinel::getUser()->email)->get();
      
  
          return view('Clients.myBooking',compact('books') );    
   }

  public function viewTime(Request $request)
    {
    $bookedTime='';
    $availableTime=availableTime::all();


    $booking=Bookings::where('date',$_REQUEST["datecal"])->get();

 
     return view('Clients.availableTime',compact('booking','availableTime'));  
    }

   public function destroyMyBooking($id)
    {
      $destroybook=Bookings::find($id);

      $destroybook->delete();
      return redirect('/myBooking');
    }
       public function showchangePassword()
       {
        return view('Clients.changePassword');
       }
       public function changePassword(Request $request)
       {
       $this->validation($request);
       $current_password=Sentinel::getUser()->password;
      

              if(Hash::check($request['current-password'], $current_password))
      {         
        $user_id = Sentinel::getUser()->id;                       
        $obj_user = Sentinel::findById($user_id);
        $obj_user->password = Hash::make($request['password']);;
        $obj_user->save(); 
        $success = 'Congratulation Password Successfully Changed';
           return view('Clients.changePassword',compact('success'));
      }
      else
      {           
        $error = 'Please enter correct current password';
      
                return view('Clients.changePassword',compact('error'));

      }
       }
     
  public function validation( $request)
    {

      $request->validate([
            'current-password' => 'required',
'password' => 'required|confirmed|max:255',
      ]);
    }
}
