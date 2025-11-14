<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //This method will Show Permission page
        public function index()
    {

    }
    //This method will Create new Permission page
    public function create(){
        return view('permissions.create');
    }
    //This method will insert a permission into database
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:permissions,name|max:255',
        ]);

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
