<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

         //$users = User::with('role')->get();
     $roles = Role::pluck('name','id');
      //  return response()->json($users);
      return view('index', ['roles' => $roles]);

    }

   
}
