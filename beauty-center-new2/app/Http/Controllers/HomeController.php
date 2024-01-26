<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == '0') {
                // Redirigez vers la route nommée 'dashboard' si l'utilisateur a le type '0'
                $employee = employee::all();
                return view('user.home', compact('employee'));
            } else {
                // Redirigez vers la vue 'admin.home' si l'utilisateur a un autre type
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
            $employee = employee::all();
            return view('user.home', compact('employee'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name = $request->input('name'); // Use input() method to retrieve form data
        $data->email = $request->input('email');
        $data->date = $request->input('date');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');
        $data->employee = $request->input('employee');
        $data->status = 'In progress';
        if (Auth::id()) {

            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successfull . We will contact you soon ');
    }

    public function myappointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id', $userid)->get();

            return view('user.my_appointment', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
