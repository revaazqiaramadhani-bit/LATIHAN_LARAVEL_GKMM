<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Murid</h5>
            <a href="{{ route('murid.create') }}" class="btn btn-light btn-sm">+ Tambah Murid</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama Murid</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($murid as $m)
                        <tr>
                            <td>{{ $m->nisn }}</td>
                            <td>{{ $m->nama_murid }}</td>
                            <td>{{ $m->jenis_kelamin }}</td>
                            <td>{{ $m->alamat }}</td>
                            <td>
                                <form action="{{ route('murid.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data murid.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $murid->links() }}
        </div>
    </div>
</div>
</body>
</html>