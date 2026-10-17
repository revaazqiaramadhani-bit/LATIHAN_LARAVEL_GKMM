@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Data Guru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <!-- NIP -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NIP <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nip" 
                                   class="form-control @error('nip') is-invalid @enderror" 
                                   value="{{ old('nip') }}" 
                                   placeholder="Masukkan 18 digit NIP" 
                                   maxlength="18" 
                                   required>
                            @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nama Guru -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_guru" 
                                   class="form-control @error('nama_guru') is-invalid @enderror" 
                                   value="{{ old('nama_guru') }}" 
                                   placeholder="Contoh: Budi Santoso, S.Pd." 
                                   required>
                            @error('nama_guru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Pendidikan Terakhir -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="Pendidikan_terakhir" 
                                   class="form-control @error('Pendidikan_terakhir') is-invalid @enderror" 
                                   value="{{ old('Pendidikan_terakhir') }}" 
                                   placeholder="Contoh: S1 Pendidikan Matematika" 
                                   required>
                            @error('Pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat tempat tinggal..." 
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('guru.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection