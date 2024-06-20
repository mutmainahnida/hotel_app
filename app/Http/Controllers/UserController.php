<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

//bagian read
public function index()
{
    $users = User::with('role')->get(); // Assuming role relationship exists

    return view('user.index', compact('users'));
}
public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
    
}