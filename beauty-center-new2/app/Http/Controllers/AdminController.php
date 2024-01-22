<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_employee');
    }

    public function upload(Request $request)
    {
        $employee = new Employee;
        $image = $request->file('file'); // Use the correct file field name
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('employeeimage', $imagename);
        $employee->image = $imagename;
        $employee->name = $request->input('name'); // Use input() method to retrieve form data
        $employee->numero_telephone = $request->input('numero_telephone');
        $employee->email = $request->input('email');
        $employee->service = $request->input('service');


        $employee->save();

        return redirect()->back()->with('message', 'Employee Added Successfully');
    }
}
