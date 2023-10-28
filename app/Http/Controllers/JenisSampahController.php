<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampah = JenisSampah::all();
        return view('admin.pages.jenis-sampah.index', compact('sampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.jenis-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $file = $request->file('foto');
        $name = $file->getClientOriginalName();
        $file->move('Image/', $name);
        JenisSampah::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $name
        ]);

        Alert::success('Berhasil!', 'Jenis Sampah Berhasil Ditambahkan');
        return redirect()->route('jenis-sampah.index');
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
        $sampah = JenisSampah::findorfail($id);
        return view('admin.pages.jenis-sampah.edit', compact('sampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $sampah = JenisSampah::findorfail($id);
        if ($request->has('foto')) {
            $file = $request->file('foto');
            $name = $file->getClientOriginalName();
            $file->move('Image/', $name);
            $sampah->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'foto' => $name
            ]);
        } else {
            $sampah->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }

        Alert::success('Berhasil!', 'Jenis Sampah Berhasil Diupdate');
        return redirect()->route('jenis-sampah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sampah = JenisSampah::findorfail($id);
        $sampah->delete();

        Alert::success('Berhasil!', 'Jenis Sampah Berhasil Dihapus');
        return redirect()->route('jenis-sampah.index');
    }
}
