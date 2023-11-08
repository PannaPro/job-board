<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);  
        
        $credentials = $request->only('email','password');
        $remeber = $request->filled('remember');

        if(Auth::attempt($credentials, $remeber)){
            return redirect()->intended('/')->with('success','Welcome');
        } else {
            return redirect()->back()->with(['error'=> 'Invalid credentials']);
        };
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
