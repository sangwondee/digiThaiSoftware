<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeFormRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees =  Employee::orderBy('created_at', 'desc')->paginate(10);

        return response()->view('employee.index', ['employees' => $employees]);
    }

    public function create()
    {
        // Refactor get Company List
        $companies = Company::all();

        return view('employee.form', compact('companies'));
    }

    public function store(EmployeeFormRequest $request)
    {
        $validated = $request->validated();

        $employee = Employee::create($validated);

        if ($employee) {
            session()->flash('notfi.success', 'Employee Created successfully!');
            return redirect()->route('employees.index', [$employee]);
        }
    }

    public function show(Employee $employee)
    {
        return view('employee.show', ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        // Refactor get Company List
        $companies = Company::all();

        return view('employee.form', compact('companies', 'employee'));
    }

    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        $update = $employee->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Employee updated successfully!');
            return redirect()->route('employees.index');
        }
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
