<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view article', only: ['index']),
            new Middleware('permission:edit article', only: ['edit','update']),
            new Middleware('permission:create article', only: ['create','store']),
            new Middleware('permission:delete article', only: ['destroy']),
        ];
    }
    // نمایش لیست واردات
    public function index()
    {
        $imports = Import::with(['company','driver','product'])->latest()->paginate(20);
        return view('imports.index', compact('imports'));
    }

    // فرم ایجاد واردات
    public function create()
    {
        $companies = Company::all();
        $drivers = Driver::all();
        $products = Product::all();

        return view('imports.create', compact('companies','drivers','products'));
    }

    // ذخیره واردات جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'product_id' => 'required|exists:products,id',
            'litres' => 'required|numeric',
            'value' => 'nullable|numeric',
            'serial_no' => 'nullable|string|max:255',
            'imported_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('imports.create')
                ->withErrors($validator)
                ->withInput();
        }

        Import::create($request->all());

        return redirect()->route('imports.index')->with('success','Import added successfully.');
    }

    // فرم ویرایش واردات
    public function edit($id)
    {
        $import = Import::findOrFail($id);
        $companies = Company::all();
        $drivers = Driver::all();
        $products = Product::all();

        return view('imports.edit', compact('import','companies','drivers','products'));
    }

    // بروزرسانی واردات
    public function update(Request $request, $id)
    {
        $import = Import::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'product_id' => 'required|exists:products,id',
            'litres' => 'required|numeric',
            'value' => 'nullable|numeric',
            'serial_no' => 'nullable|string|max:255',
            'imported_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('imports.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $import->update($request->all());

        return redirect()->route('imports.index')->with('success','Import updated successfully.');
    }

    // حذف واردات
    public function destroy(Request $request)
    {
        $import = Import::find($request->id);
        if(!$import) {
            return response()->json(['status'=>false]);
        }

        $import->delete();
        return response()->json(['status'=>true]);
    }
}
