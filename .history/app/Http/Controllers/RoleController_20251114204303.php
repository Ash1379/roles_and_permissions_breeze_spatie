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
        $roles = Role::orderBy('name','DESC')->paginate(10);

     return view("role.list",[
        'roles'=> $roles
    ]);

    }
    // This method will Create new Role page
    public function create(){
        $permissions = Permission::orderBy('name','asc')->get();
        return view('role.create',[
            'permissions'=> $permissions
        ]);

    }
    // This method will insert a role into database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {

            $role = Role::create(['name' => $request->name]);


            if (!empty($request->permissions)) {
                foreach($request->permissions as $name) {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('roles.index')
                    ->with('success', 'Role added successfully.');
        }

        return redirect()->route('roles.create')
                ->withInput()
                ->withErrors($validator);
    }

    // This method will edit a role into database
    public function edit($id){
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name','ASC')->get();
        return view('role.edit',[
            'permissions'=> $permissions,
            'hasPermissions'=> $hasPermissions,
            'role' => $role
        ]);
    }
    public function update(Request $request, $id){
        
    }

}
