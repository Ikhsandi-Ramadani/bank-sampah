<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.login.index');
    }

    public function proses_login(Request $request)
    {
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            Alert::success('Berhasil!', 'Login Berhasil');
            return redirect()->route('dashboard');
        } else {
            Alert::Error('Gagal!', 'Email atau Password salah');
            return redirect()->route('login')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
