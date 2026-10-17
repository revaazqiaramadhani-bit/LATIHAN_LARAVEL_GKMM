@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Mata Pelajaran</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kode Mapel <span class="text-danger">*</span></label>
                            <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror" value="{{ old('kode_mapel', $mapel->kode_mapel) }}" required>
                            @error('kode_mapel')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jam Pelajaran <span class="text-danger">*</span></label>
                            <input type="number" name="jam_pelajaran" class="form-control @error('jam_pelajaran') is-invalid @enderror" value="{{ old('jam_pelajaran', $mapel->jam_pelajaran) }}" min="1" required>
                            @error('jam_pelajaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" value="{{ old('nama_mapel', $mapel->nama_mapel) }}" required>
                        @error('nama_mapel')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Guru Pengampu</label>
                        <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                            <option value="">-- Pilih Guru (Opsional) --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id', $mapel->guru_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }} (NIP: {{ $guru->nip }})
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('mapel.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection