<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
    } // end method

    public function index() {
        if(Auth::id())
        {
            return redirect('home');
        }
        else 
        {
        $doctor = Doctor::all();
        return view('user.home', compact('doctor'));
        }
    
    } // end method

    public function appointment(Request $request) {
        $data = new appointment;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->doctor = $request->doctor;
            $data->date = $request->date;
            $data->message = $request->message;
            $data->status = 'In progress';
            
            if(Auth::id()) 
            {
                $data->user_id = Auth::user()->id;
            }
            $data->save();            

        $notification = array(
            'message' => 'Appointment Arranged Successfully',
            'alert-type' => 'success',
           
           );
        return redirect()->back()->with($notification);
    } // end method

    public function myappointment() 
    {
       
        if(Auth::id())
        {

            if(Auth::user()->usertype==0)
            {
                $user_id = Auth::user()->id;
                $appoint = Appointment::where('user_id', $user_id)->get();
                return view('user.my_appointment',compact('appoint'));
                
            }

            else 
            {
                return redirect()->back();
            } 
        }
        else {
            return redirect('login');
        }
     

      
        
    } // end method

    public function cancel_appoint($id) 
    {
        Appointment::find($id)->delete();
        
        
        $notification = array(
            'message' => "Appointment Deleted Successfully",
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // end method
 }