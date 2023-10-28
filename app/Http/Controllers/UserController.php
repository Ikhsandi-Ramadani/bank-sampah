<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $jeniss = JenisSampah::all();
        $hitung = false;
        return view('user.index', compact('jeniss', 'hitung'));
    }

    public function hitung(Request $request)
    {
        $jenisSampah = JenisSampah::find($request->jenis_id);
        $jeniss = JenisSampah::all();
        $jumlah = $request->jumlah;
        $harga = $jenisSampah->harga;
        $total = $jumlah * $harga;
        $hitung = true;

        return view('user.index', compact('jenisSampah', 'jumlah', 'total', 'hitung', 'jeniss'));
    }
}
