<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

use App\Models\Appointment;

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

    public function showappointment()
    {
        $data = appointment::all();
        return view('admin.showappointment', compact('data'));
    }

    public function approved($id)
    {
        $data = appointment::find($id);
        $data->status = 'approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = appointment::find($id);
        $data->status = 'canceled';
        $data->save();

        return redirect()->back();
    }

    public function showemployee()
    {
        $data = employee::all();
        return view('admin.showemployee', compact('data'));
    }

    public function deleteemployee($id_Employe)
    {
        $data = employee::find($id_Employe);
        $data->delete();

        return redirect()->back();
    }

    public function updateemployee($id_Employe)
    {
        $data = employee::find($id_Employe);

        return view('admin.update_employee', compact('data'));
    }

    public function editemployee($id_Employe, Request $request)
    {
        $employee = employee::find($id_Employe);
        $employee->name = $request->input('name'); // Use input() method to retrieve form data
        $employee->numero_telephone = $request->input('numero_telephone');
        $employee->email = $request->input('email');
        $employee->service = $request->input('service');

        $image = $request->file('file'); // Use the correct file field name
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('employeeimage', $imagename);
            $employee->image = $imagename;
        }

        $employee->save();

        return redirect()->back()->with('message', 'Employee Updated Successfully');
    }
}
