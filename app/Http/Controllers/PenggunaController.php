<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/login');
        }

        $users = Pengguna::all();
        return view('daftar_pengguna', compact('users'));
    }

    public function create()
    {
        return view('tambah_pengguna');
    }

    public function store(Request $request)
    {
        // validasi sederhana
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        Pengguna::create([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/daftar_pengguna');
    }

    public function edit($id)
    {
        $user = Pengguna::findOrFail($id);
        return view('edit_pengguna', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);

        $request->validate([
            'email' => 'required|email'
        ]);

        $data = [
            'email' => $request->email,
        ];

        // password hanya diupdate kalau diisi
        if ($request->password) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect('/daftar_pengguna');
    }

    public function destroy($id)
    {
        $user = Pengguna::findOrFail($id);
        $user->delete();

        return redirect('/daftar_pengguna');
    }
}
