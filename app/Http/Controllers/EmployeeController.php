<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        $datas = Employee::latest()->paginate(10);
        return view('pages.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Employee::create($data);

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('pages.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->all();

        $employee->update($data);

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index');
    }

    public function trash()
    {
        $datas = Employee::onlyTrashed()->get();

        return view('pages.trash', compact('datas'));
    }

    public function restore($id)
    {
        $employee = Employee::onlyTrashed()->find($id);
        $employee->restore();

        return redirect()->route('employee.index');
    }

    public function restoreAll()
    {
        $employee = Employee::onlyTrashed();
        $employee->restore();

        return redirect()->route('employee.index');
    }

    public function force($id)
    {
        $employee = Employee::onlyTrashed()->find($id);
        $employee->forceDelete();

        return redirect()->route('trash');
    }

    public function forceAll()
    {
        $employee = Employee::onlyTrashed();
        $employee->forceDelete();

        return redirect()->route('trash');
    }
}
