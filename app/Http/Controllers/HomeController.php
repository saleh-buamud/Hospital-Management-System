<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirectToDashboard()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));
        }
    }
    public function appointment(Request $request)
    {
        $data = new appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment request sent successfully!');
    }
    public function myAppointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoints = appointment::where('user_id', $userid)->get();
            return view('user.myappointment', compact('appoints'));
        } else {
            return redirect()->back();
        }
    }
    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Appointment canceled successfully!');
    }
}
