<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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
            'pageTitle' => 'Sign In',
        ];

        return view('login', $data);
    }

    /**
     * Proses Login.
     */
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
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

    /**
     * Menampilkan halaman Register.
     */
    public function registerView()
    {
        $data = [
            'roles' => Role::all()->whereNotIn('id', [1]),
        ];

        return view('register', $data);
    }

    /**
     * Proses Register.
     */
    public function registerProcess(Request $request)
    {
        $credentials = $request->validate([
            'name'             => ['required'],
            'email'            => ['required', 'email:dns', 'unique:users,email'],
            'role_id'          => ['required'],
            'password'         => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        User::create($credentials);

        // jika register sukses
        return redirect('/login')->with('message', 'Akun berhasil dibuat, silakan login menggunakan akun baru anda');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
