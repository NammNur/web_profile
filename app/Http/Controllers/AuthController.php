<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // =========================================================
    //                          LOGIN
    // =========================================================

    // Tampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login (langsung redirect tanpa validasi)
    public function login(Request $request)
    {
        return redirect()->route('admin.dashboard'); 
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


    // =========================================================
    //                         REGISTER
    // =========================================================

    // Tampilkan form register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register (langsung balik ke login)
    public function register(Request $request)
    {
        return redirect()->route('login');
    }
}
