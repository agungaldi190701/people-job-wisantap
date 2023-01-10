<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function register()
    {
        return view('content.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ]
        );
        
        if ($user == true) {
            return redirect('/login')->with('success', 'Berhasil mendaftar!');
        }

        
    }
}
