<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        // dummy login tanpa database
        if ($email == "admin@gmail.com" && $password == "123456") {

            session([
                'user' => $email
            ]);

            return redirect('dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
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
