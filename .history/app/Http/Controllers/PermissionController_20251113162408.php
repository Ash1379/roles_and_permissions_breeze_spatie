<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //This method will Show Permission page
        public function index()
    {
        return view('permissions.list');

    }
    //This method will Create new Permission page
    public function create(){
        return view('permissions.create');
    }
    //This method will insert a permission into database
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3'
        ]);
        if($validator->passes()){
            //code to insert permission
           Permission::create(['name' => $request->name]);
            retuern redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        }
        else{
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }
    // This method will Edit Permission page
    public function edit(){

    }
    //this method will update a permission
    public function update(){

    }
    //This method will delete a permission in database
    public function destroy(){

    }
}
