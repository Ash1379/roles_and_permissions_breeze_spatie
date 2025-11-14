<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //This method will Show Permission page
        public function index()
    {
        return view('permissions.index');
    }
}
