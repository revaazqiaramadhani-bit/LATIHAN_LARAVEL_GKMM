<?php

namespace App\Http\Controllers;

use App\Models\Kopdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KopdesController extends Controller
{
    // 1. Tampilkan List/Daftar Kopdes
    public function index()
    {
        $kopdes = Kopdes::all();
        return view('kopdes.index', compact('kopdes'));
    }

    // 2. Tampilkan Formulir Tambah Data
    public function create()
    {
        return view('kopdes.create');
    }

    // 3. Simpan Data Baru dari Form ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko_kopdes' => 'required',
            'nama_manajer'     => 'required',
            'alamat'           => 'required',
            'tanggal_berdiri'  => 'required|date',
            'foto_kopdes'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_kopdes')) {
            $fotoPath = $request->file('foto_kopdes')->store('kopdes_foto', 'public');
        }

        Kopdes::create([
            'nama_toko_kopdes' => $request->nama_toko_kopdes,
            'nama_manajer'     => $request->nama_manajer,
            'alamat'           => $request->alamat,
            'tanggal_berdiri'  => $request->tanggal_berdiri,
            'foto_kopdes'      => $fotoPath,
        ]);

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit
    public function edit($id)
    {
        $kopdes = Kopdes::findOrFail($id);
        return view('kopdes.edit', compact('kopdes'));
    }

    // 5. Update Data yang Diubah
    public function update(Request $request, $id)
    {
        $kopdes = Kopdes::findOrFail($id);

        $request->validate([
            'nama_toko_kopdes' => 'required',
            'nama_manajer'     => 'required',
            'alamat'           => 'required',
            'tanggal_berdiri'  => 'required|date',
            'foto_kopdes'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_kopdes')) {
            if ($kopdes->foto_kopdes) {
                Storage::disk('public')->delete($kopdes->foto_kopdes);
            }
            $kopdes->foto_kopdes = $request->file('foto_kopdes')->store('kopdes_foto', 'public');
        }

        $kopdes->update([
            'nama_toko_kopdes' => $request->nama_toko_kopdes,
            'nama_manajer'     => $request->nama_manajer,
            'alamat'           => $request->alamat,
            'tanggal_berdiri'  => $request->tanggal_berdiri,
            'foto_kopdes'      => $kopdes->foto_kopdes,
        ]);

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil diperbarui!');
    }

    // 6. Hapus Data
    public function destroy($id)
    {
        $kopdes = Kopdes::findOrFail($id);
        if ($kopdes->foto_kopdes) {
            Storage::disk('public')->delete($kopdes->foto_kopdes);
        }
        $kopdes->delete();

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil dihapus!');
    }
}