<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data
        $murid = Murid::latest()->paginate(10);
        return view('murid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Membuat formulir Tambah Data
        return view('murid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Memproses Penambahan data ke basis data

        $request->validate([
            'nisn'          => 'required|numeric|unique:murid,nisn',
            'nama_murid'    => 'required|string|max:255',
            'alamat'        => 'required|string',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
        ]);

        Murid::create($request->all());

        return redirect()->route('murid.index')
                         ->with('success', 'Data murid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Murid $murid)
    {
        // Membuat sebuah formulir edit
        return view('murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Murid $murid)
    {
        //Memproses Ubah Data ke dalam Basis Data
        $request->validate([
            'nisn'          => 'required|numeric|unique:murid,nisn,' . $murid->id,
            'nama_murid'    => 'required|string|max:255',
            'alamat'        => 'required|string',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
        ]);

        $murid->update($request->all());

        return redirect()->route('murid.index')
                         ->with('success', 'Data murid berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Murid $murid)
    {
        //Menghapus Data
        $murid->delete();

        return redirect()->route('murid.index')
                         ->with('success', 'Data murid berhasil dihapus.');

    }
}