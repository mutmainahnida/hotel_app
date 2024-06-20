<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //bagian untuk menampilkan create
    public function create()
    {
        $roles = Role::all();
        $data = [
            "roles" => $roles
        ];
        return view('user.create',$data);
    }

    //bagian untuk store create
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id'   => $request->role_id
        // Assign role_id if applicable
    ]);

    return redirect()->route('user.index')->with('success', 'User created successfully');
}

}
    public function edit($id)
    {
        $user = User::find($id);
        $data = [
            "user"  => $user 
        ];
        return view('user.edit', $data);
    }

    //bagian update
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('user.index');
    
    }
}
