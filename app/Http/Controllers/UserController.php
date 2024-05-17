<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'users' => User::all(),
        ];

        return view('apps.users.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'roles' => Role::all()->whereNotIn('id', [1]),
            'formMethod' => 'POST',
            'formAction' => route('users.store'),
            'pageTitle' => 'Tambah Data User',
        ];

        return view('apps.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role_id' => ['required'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        User::create($credentials);

        return redirect('/users')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $data = [
            'user' => $user,
            'roles' => Role::all()->whereNotIn('id', [1]),
            'formMethod' => 'PATCH',
            'formAction' => route('users.update', ['user' => $user->id]),
            'pageTitle' => 'Edit Data User',
        ];

        return view('apps.users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role_id' => 'nullable',
            'password' => 'nullable',
            'confirm_password' => ['same:password'],
        ]);

        unset($credentials['confirm_password']);
        if ($credentials['password'] == null) {
            unset($credentials['password']);
        }
        
        User::find($id)->update($credentials);

        return redirect('/users')->with('message', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/users')->with('message', 'Data Berhasil Dihapus');
    }
}
