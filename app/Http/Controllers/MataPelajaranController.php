<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        // Eager loading data guru pengampu
        $mapels = MataPelajaran::with('guru')->latest()->get();
        return view('mapel.index', compact('mapels'));
    }

    public function create()
    {
        $gurus = Guru::all(); // Untuk pilihan dropdown guru
        return view('mapel.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel'    => 'required|unique:mata_pelajaran_,kode_mapel',
            'nama_mapel'    => 'required|string|max:255',
            'jam_pelajaran' => 'required|integer|min:1',
            'nip'           => 'nullable|exists:guru,nip',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $gurus = Guru::all();
        return view('mapel.edit', compact('mapel', 'gurus'));
    }

    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'kode_mapel'    => 'required|unique:mata_pelajaran_,kode_mapel,' . $id,
            'nama_mapel'    => 'required|string|max:255',
            'jam_pelajaran' => 'required|integer|min:1',
            'nip'           => 'nullable|exists:guru,nip',
        ]);

        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus!');
    }
}