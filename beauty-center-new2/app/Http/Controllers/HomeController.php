<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

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
}
