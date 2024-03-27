<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    //

    public function addDoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }

    public function uploadDoctor(Request $request)
    {
        $doctor = new Doctor();
        $newImageName = uniqid() . '-' . now()->format('Y-m-d_H-i-s') . '-' . $request->image->extension();

        // Move the uploaded image to the public/images directory
        $request->image->move(public_path('images'), $newImageName);
        $doctor->image = $newImageName;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function showAppointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $appointments = Appointment::all();
                return view('admin.showappointment', compact('appointments'));
            } else {
                return redirect('/')->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function approveAppoint($id)
    {
        $appoint = Appointment::findOrFail($id);
        $appoint->status = 'Approve';
        $appoint->save();
        return redirect()->back();
    }
    public function cancelAppoint($id)
    {
        $appoint = Appointment::findOrFail($id);
        $appoint->status = 'Cancel';
        $appoint->save();
        return redirect()->back();
    }

    public function showAllDoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $doctors = Doctor::all();
                return view('admin.alldoctors', compact('doctors'));
            } else {
                return redirect('login')->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function editDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.editdoctor', compact('doctor'));
    }
    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $newImageName = uniqid() . '-' . now()->format('Y-m-d_H-i-s') . '-' . $request->image->extension();

        // Move the uploaded image to the public/images directory
        $request->image->move(public_path('images'), $newImageName);
        $doctor->image = $newImageName;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect('alldoctors')->with('message', 'Doctor Updated Successfully');
    }

    public function emailview(Request $request, $id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $data = Appointment::findOrFail($id);
                return view('admin.emailview', compact('data'));
            } else {
                return redirect('login')->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function sendEmail(Request $request, $id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $data = Appointment::find($id);
                $details = [
                    'greeting' => $request->greeting,
                    'body' => $request->body,
                    'actiontext' => $request->actiontext,
                    'actionurl' => $request->actionurl,
                    'endpart' => $request->endpart,
                ];
                Notification::send($data, new SendEmailNotification($details));
                return redirect()->back()->with('message', 'Email Sent Successfully');
            } else {
                return redirect('login')->back();
            }
        } else {
            return redirect('login')->back();
        }
    }
}
