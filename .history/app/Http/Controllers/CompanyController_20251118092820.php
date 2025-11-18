<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CompanyController extends Controller
{
    // نمایش لیست شرکت‌ها
    public function index()
    {
        $companies = Company::latest()->paginate(20);
        return view('companies.index', compact('companies'));
    }

    // فرم ایجاد شرکت
    public function create()
    {
        return view('companies.create');
    }

    // ذخیره شرکت جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('companies.create')
                ->withErrors($validator)
                ->withInput();
        }

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // فرم ویرایش شرکت
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    // بروزرسانی شرکت
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('companies.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    // حذف شرکت
    public function destroy(Request $request)
    {
        $company = Company::find($request->id);

        if (!$company) {
            return response()->json(['status' => false]);
        }

        $company->delete();
        return response()->json(['status' => true]);
    }
}
