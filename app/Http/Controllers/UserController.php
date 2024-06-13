<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id){
        $user = User::find($id);
        $data = [
            "user"  => $user 
        ];
        return view('user.edit',$data);
    }

    public function update(Request $request){
        $request->validate([
            ??????
        ])

        // Edit Usernya

        // redirect ke halaman index
    }
}
