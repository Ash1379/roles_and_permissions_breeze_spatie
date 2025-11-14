<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    // This method will Show Role page
    public function index(){

    }
    // This method will Create new Role page
    public function create(){
        $permissions = Permission::orderBy('name','asc')->get();
        return view('role.create'[
            'permissions'=> $permissions
        ]);

    }
    // This method will insert a role into database
    public function store(){
    }
}
