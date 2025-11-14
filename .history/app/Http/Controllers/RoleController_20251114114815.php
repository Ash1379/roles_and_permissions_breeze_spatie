<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // This method will Show Role page
    public function index(){

    }
    // This method will Create new Role page
    public function create(){
        $permissions = Permission::orderBy('name','asc')->get();
        return view('role.create',[
            'permissions'=> $permissions
        ]);

    }
    // This method will insert a role into database
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);
        if ($validator->passes()) {
            dd($request->permissions);

            Role::create(['name'=>$request->name]);
        }

    }
}
