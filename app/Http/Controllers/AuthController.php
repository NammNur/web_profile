<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        // Validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->filled('remember');

        // Attempt to authenticate
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Redirect to intended page or home
            return redirect()->intended(route('home'));
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
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
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,username',
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'password' => 'required|min:6',
    ]);

    User::create([
        'email' => $request->email,
        'username' => $request->username,
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'password' => Hash::make($request->password),
        'role' => 'user',
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil');
}
}