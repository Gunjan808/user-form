<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use App\Models\User;

class UserApiController extends Controller
{
    public function index(){
        

        $users = User::with('role')->get();
        return response()->json($users);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[6-9]\d{9}$/',
           // 'description' => 'nullable|string',
            'description' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
           // 'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
          //  dd( $validator->errors());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $path = null;
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'role_id' => $request->role_id,
            'profile_image' => $path,
        ]);

        $role = Role::find($request->role_id);

        if ($role) {
            $user->role['name'] = $role->name;
        } else {
            $user->role['name'] = 'null';
        }
       


        return response()->json($user, 201);
    }
       
}
