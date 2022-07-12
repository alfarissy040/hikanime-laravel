<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validationData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if(Auth::attempt($validationData)){
            return redirect()->intended('/hikamin');
        }

        return back()->with('error', 'Login Failed!');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
