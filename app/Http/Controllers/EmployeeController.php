<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'

        ]);
        $employee = new Employee([
            'first_name' =>$request->get('first_name'),
            'last_name' =>$request->get('last_name'),
            'email'=>$request->get('email'),
            'phone_number'=>$request->get('phone_number'),
        ]);
        $employee->save();
        return redirect('/employees')->with('success', 'Employee saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('companies.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate()([
            'first_name'=>'required',
            'last_name'=>'required'

        ]);


        $employee = Employee::find($id);
        $employee->first_name =  $request->get('first_name');
        $employee->last_name =  $request->get('last_name');
        $employee->email = $request->get('email');
        $employee->phone_number = $request->get('phone_number');
        $employee->update();

        return redirect('/employees')->with('success', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id', $employee_id)->delete();

        // return redirect('/employees')->with('success', 'Employee deleted!');
        return redirect()->route("employees.index");
    }
}
