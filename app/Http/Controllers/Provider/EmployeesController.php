<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = auth()->user()->employees;

        return view('provider-panel.employees.index',compact('employees'));
    }

    public function create()
    {
        return view('provider-panel.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_id' => 'required|numeric|unique:managers,manager_id|digits:6',
            'phone' => 'required|string|max:255|unique:managers,phone',
            'password' => 'required|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = auth()->user()->employees()->create([
            'name' => $request->name,
            'manager_id' => $request->manager_id,
            'description' => 'Employee of ' . auth()->user()->name,
            'title' => 'Employee',
            'phone' => $request->phone,
            'company_id' => auth()->user()->company_id,
            'password' => $request->password,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('uploads/employees', 'public');
            $employee->files()->create([
                'name' => $employee->name,
                'path' => $profilePicturePath,
            ]);
        }

        return redirect()->route('provider-panel.employees.index')->with('success', 'Employee created successfully!');
    }

    public function edit($employee)
    {
        $employee = auth()->user()->employees()->findOrFail($employee);

        return view('provider-panel.employees.edit',compact('employee'));
    }

    public function update(Request $request, $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_id' => 'numeric|digits:6|required|string|unique:managers,manager_id,' . $employee,
            'phone' => 'required|string|max:255|unique:managers,phone,' . $employee,
            'password' => 'nullable|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = auth()->user()->employees()->findOrFail($employee);

        $employee->update([
            'name' => $request->name,
            'manager_id' => $request->manager_id,
            'phone' => $request->phone,
            'password' => $request->password ? $request->password : $employee->password,
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($employee->files->isNotEmpty()) {
                $oldProfilePicture = $employee->files->first();
                Storage::disk('public')->delete($oldProfilePicture->path);
                $oldProfilePicture->delete();
            }

            $profilePicturePath = $request->file('profile_picture')->store('uploads/employees', 'public');

            $employee->files()->create([
                'name' => $employee->name,
                'path' => $profilePicturePath,
            ]);
        }

        return redirect()->route('provider-panel.employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy($employee)
    {
        $employee = auth()->user()->employees()->findOrFail($employee);

        $employee->delete();

        return redirect()->route('provider-panel.employees.index')->with('success', 'Employee deleted successfully!');
    }

}
