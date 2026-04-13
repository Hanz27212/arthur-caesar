<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            session(['login' => true]);
            return redirect('/daftar_pengguna');
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
    }

    public function dashboard()
    {
        $data = [
            'users' => 120,
            'products' => 80,
            'transactions' => 350,
            'revenue' => 25000000
        ];

        return view('dashboard', $data);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');

        return redirect('/login');
    }
}
