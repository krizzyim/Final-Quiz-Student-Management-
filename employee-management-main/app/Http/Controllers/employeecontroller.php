<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employees = employee::get();

        return view ('employee.index', compact('employees'));
    }

    public function create()
    {
        return view ('employee.index');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255',
        'lname' => 'required|max:255',
        'midname' => 'required|max:255',
        'age' => 'required|integer',
        'address' => 'required|max:255',
        'zip' => 'required|integer',
    ]);

    employee::create($request->all());
    return redirect()->route('employee.index')->with('status','Employee Created Successfully!');
    }

    public function edit( int $id)
    {
        $employee = employee::find($id);
        return view ('employee.edit', compact('employee'));
    }

    public function update(Request $request, int $id) {
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'midname' => 'required|max:255',
            'age' => 'required|integer',
            'address' => 'required|max:255',
            'zip' => 'required|integer',
        ]);

        employee::findOrFail($id)->update($request->all());
        return redirect()->route('employee.index')->with('status','Employee Updated Successfully!');
    }

    public function delete(int $id){
        $employees = employee::findOrFail($id);
        $employees->delete();
        return redirect()->route('employee.index')->with('status','Employee Deleted Successfully!');
    }
}
