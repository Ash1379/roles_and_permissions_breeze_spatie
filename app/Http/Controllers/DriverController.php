<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DriverController extends Controller implements HasMiddleware
{
  public static function middleware(): array
    {
        return [
            new Middleware('permission:view driver', only: ['index']),
            new Middleware('permission:edit driver', only: ['edit','update']),
            new Middleware('permission:create driver', only: ['create','store']),
            new Middleware('permission:delete driver', only: ['destroy']),
        ];
    }
    // نمایش لیست رانندگان
    public function index()
    {
        $drivers = Driver::latest()->paginate(20);
        return view('drivers.index', compact('drivers'));
    }

    // فرم ایجاد راننده
    public function create()
    {
        return view('drivers.create');
    }

    // ذخیره راننده جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('drivers.create')
                ->withErrors($validator)
                ->withInput();
        }

        Driver::create($request->all());

        return redirect()->route('drivers.index')->with('success', 'Driver created successfully.');
    }

    // فرم ویرایش راننده
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    // بروزرسانی راننده
    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('drivers.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $driver->update($request->all());

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    // حذف راننده
    public function destroy(Request $request)
    {
        $driver = Driver::find($request->id);

        if (!$driver) {
            return response()->json(['status' => false]);
        }

        $driver->delete();
        return response()->json(['status' => true]);
    }
}
