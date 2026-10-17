@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-people me-2"></i>Daftar Data Guru</h5>
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Guru
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $index => $g)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td>
                            <span class="badge bg-secondary-subtle text-dark border">{{ $g->nip }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:34px; height:34px; font-size:13px; font-weight:bold;">
                                    {{ strtoupper(substr($g->nama_guru, 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ $g->nama_guru }}</span>
                            </div>
                        </td>
                        <td>
                            @if($g->jenis_kelamin == 'Pria')
                                <span class="badge bg-primary-subtle text-primary"><i class="bi bi-gender-male me-1"></i>Pria</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger"><i class="bi bi-gender-female me-1"></i>Wanita</span>
                            @endif
                        </td>
                        <td><span class="badge bg-info-subtle text-info-emphasis">{{ $g->Pendidikan_terakhir }}</span></td>
                        <td class="text-muted small" style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                            {{ $g->alamat }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-2 text-secondary"></i>
                            Belum ada data guru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection