<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class ReservoirController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view reservoir', only: ['index']),
            new Middleware('permission:edit reservoir', only: ['edit','update']),
            new Middleware('permission:create reservoir', only: ['create','store']),
            new Middleware('permission:delete reservoir', only: ['destroy']),
        ];
    }
    // ✔ نمایش لیست مخازن
    public function index()
    {
        $reservoirs = Reservoir::latest()->paginate(20);
        return view('reservoirs.index', compact('reservoirs'));
    }

    // ✔ فرم ایجاد مخزن
    public function create()
    {
        return view('reservoirs.create');
    }

    // ✔ ذخیره مخزن جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservoirs.create')
                ->withErrors($validator)
                ->withInput();
        }

        Reservoir::create($request->all());

        return redirect()->route('reservoirs.index')
            ->with('success', 'Reservoir created successfully.');
    }

    // ✔ فرم ویرایش مخزن
    public function edit($id)
    {
        $reservoir = Reservoir::findOrFail($id);
        return view('reservoirs.edit', compact('reservoir'));
    }

    // ✔ بروزرسانی مخزن
    public function update(Request $request, $id)
    {
        $reservoir = Reservoir::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservoirs.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $reservoir->update($request->all());

        return redirect()->route('reservoirs.index')
            ->with('success', 'Reservoir updated successfully.');
    }

    // ✔ حذف مخزن
    public function destroy(Request $request)
    {
        $reservoir = Reservoir::find($request->id);

        if (!$reservoir) {
            return response()->json(['status' => false]);
        }

        $reservoir->delete();

        return response()->json(['status' => true]);
    }
}
