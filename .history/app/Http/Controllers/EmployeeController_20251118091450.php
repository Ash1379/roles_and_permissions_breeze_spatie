<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EmployeeController extends Controller
{
    // ✔ نمایش لیست کارمندان
    public function index()
    {
        $employees = Employee::with('user')->latest()->paginate(20);
        return view('employees.index', compact('employees'));
    }

    // ✔ فرم ایجاد
    public function create()
    {
        $users = User::all();
        return view('employees.create', compact('users'));
    }

    // ✔ ذخیره کارمند جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('employees.create')
                ->withErrors($validator)
                ->withInput();
        }

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    // ✔ فرم ویرایش
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::all();
        return view('employees.edit', compact('employee', 'users'));
    }

    // ✔ بروزرسانی کارمند
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('employees.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    // ✔ حذف کارمند
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);

        if (!$employee) {
            return response()->json(['status' => false]);
        }

        $employee->delete();

        return response()->json(['status' => true]);
    }
}
