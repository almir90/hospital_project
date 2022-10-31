<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use PhpParser\Comment\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addview() 
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
                
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }

    } // end method

    public function upload(Request $request) 
    {
        $doctor = new doctor;
        // getting image file 
        $image = $request->file; 
        // getting name of image(every time different name)
        $image_name = time().'.'.$image->getClientOriginalExtension();
        // creating folder 'doctorimage' in PUBLIC folder and storing image
        $request->file->move('doctorimage', $image_name);
        // sending image to database $doctor (database name) database name // $image = $image_name(actual image)
        $doctor->image = $image_name;

////////////////Initialization///////////////////////////////////////
       Doctor::insert([
        'image' => $image_name,
        'name' => $request->name,
        'phone' => $request->phone,
        'room' => $request->room,
        'speciality' => $request->speciality,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        
       ]);
       
       $notification = array(
        'message' => 'Doctor Info Inserted Successfully',
        'alert-type' => 'success',
       
       );

       return redirect()->back()->with($notification);
        
    } // end method

    public function showappointments() 
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {
        $data = Appointment::all();
        return view('admin.showappointments', compact('data'));

            }
            else 
            {
                return redirect()->back();
            }
        }

        else
        {
            return redirect('login');
        }
            
    } // end method

    public function approved($id) {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();

        $notification = array(
            'message' => 'Appointment Approved Successfully',
            'alert-type' => 'success',
           
           );
    
           return redirect()->back()->with($notification);
        } // end method

        public function canceled($id) 
        {
            $data = Appointment::find($id);
            $data->status = 'Canceled';
            $data->save();
            
            $notification = array(
                'message' => 'Appointment Canceled Successfully',
                'alert-type' => 'success',
               
               );
        
               return redirect()->back()->with($notification);
        } // end method

        public function showdoctor() {
            $data = Doctor::all();
            return view('admin.showdoctor', compact('data'));
        } // end method

        public function deletedoctor($id) {
            Doctor::findOrFail($id)->delete();
            
            $notification = array(
                'message' => 'Doctor Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } // end method

        public function updatedoctor($id) {
            $data = Doctor::findOrFail($id);
            return view('admin.update_doctor', compact('data'));
        } // end method

        public function editdoctor(Request $request, $id) {
            $doctor = Doctor::find($id);
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->speciality = $request->speciality;
            $doctor->room = $request->room;
            
            $image = $request->file;

            if($image) {

            

            $imagename = time(). '.'. $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;

        }

            $doctor->save();

            $notification = array(
                'message' => 'Doctor Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);



            return redirect()->back();
            


        } // end method
     
       
    }

       