<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class RoleController extends Controller implements HasMiddleware
{
      public static function middleware(): array
    {
        return [
            new Middleware('permission:view Role', ['index']),
            new Middleware('permission:edit Role', ['edit']),
            new Middleware('permission:create Role', ['create','store']),
            new Middleware('permission:delete Role', ['destroy']),
        ];
    }

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
    public function update($id, Request $request){
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'.$id.',id'
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permissions)) {
              $role->syncPermissions($request->permissions);
            } else{
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.index')
                    ->with('success', 'Role Updated successfully.');
        }

        return redirect()->route('roles.edit',$id)
                ->withInput()
                ->withErrors($validator);
    }
    public function destroy(Request $request){
        $id = $request->id;
        $role = Role::find ($id);
        if($role == null){
            session()->flash('error','Role not found');
            return response()->json([
                'status' =>false
            ]);
        }
        $role->delete();
            session()->flash('success','Role Deleted successfully.');
        return response()->json([
            'status'=>true
            ]);
    }
}
