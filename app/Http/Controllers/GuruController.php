<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gurus = Guru::with('mataPelajaran')->latest()->get();
        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $request->validate([
            'nip'                 => 'required|unique:guru,nip|max:18',
            'nama_guru'           => 'required|string|max:255',
            'alamat'              => 'required|string',
            'jenis_kelamin'       => 'required|in:Pria,Wanita',
            'Pendidikan_terakhir' => 'required|string',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $guru = Guru::with('mataPelajaran')->findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip'                 => 'required|max:18|unique:guru,nip,' . $id,
            'nama_guru'           => 'required|string|max:255',
            'alamat'              => 'required|string',
            'jenis_kelamin'       => 'required|in:Pria,Wanita',
            'Pendidikan_terakhir' => 'required|string',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus!');
    }
}
