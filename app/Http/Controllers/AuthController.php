<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman Login.
     */
    public function loginView(): View
    {
        $data = [
            'pageTitle' => 'Sign In'
        ];

        return view('login', $data);
    }

    /**
     * Menampilkan halaman Register.
     */
    public function registerView()
    {
        $data = [
            'pageTitle' => 'Sign Up'
        ];

        return view('register', $data);
    }

    /**
     * Proses Login.
     */
    public function loginProcess(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // jika login sukses
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        // jika login gagal
        return back()->withErrors([
            'message' => 'Username atau password salah !',
        ])->onlyInput('email');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
