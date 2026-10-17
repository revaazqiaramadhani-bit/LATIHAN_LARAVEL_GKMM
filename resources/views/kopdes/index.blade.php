<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kopdes - Modern UI</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f0f4f9;
            color: #1e293b;
        }
        .header-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border-radius: 20px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }
        .table-custom tbody tr {
            transition: all 0.2s ease;
        }
        .table-custom tbody tr:hover {
            background-color: #f8fafc;
            transform: scale(1.002);
        }
        .img-thumb {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .btn-action {
            border-radius: 10px;
            padding: 7px 14px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .badge-date {
            background-color: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <div class="header-bg p-4 p-md-5 mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1"><i class="fa-solid fa-store me-2"></i> Koperasi Desa</h2>
            <p class="mb-0 opacity-75">Kelola informasi dan manajer Kopdes dengan antarmuka modern</p>
        </div>
        <a href="{{ route('kopdes.create') }}" class="btn btn-light text-primary fw-bold px-4 py-2 rounded-3 shadow-sm btn-action">
            <i class="fa-solid fa-plus-circle me-1"></i> Tambah Kopdes Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card card-custom p-3">
        <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
                <thead class="text-secondary text-uppercase small fw-bold">
                    <tr>
                        <th class="py-3 ps-3">ID</th>
                        <th class="py-3">Foto</th>
                        <th class="py-3">Nama Toko</th>
                        <th class="py-3">Manajer</th>
                        <th class="py-3">Alamat</th>
                        <th class="py-3">Tanggal Berdiri</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kopdes as $item)
                    <tr>
                        <td class="ps-3 fw-bold text-muted">#{{ $item->id_kopdes }}</td>
                        <td>
                            @if($item->foto_kopdes)
                                <img src="{{ asset('storage/' . $item->foto_kopdes) }}" class="img-thumb" alt="Foto">
                            @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center img-thumb small">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-bold text-dark fs-6">{{ $item->nama_toko_kopdes }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle text-primary rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:32px; height:32px;">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <span class="fw-semibold">{{ $item->nama_manajer }}</span>
                            </div>
                        </td>
                        <td class="text-secondary small" style="max-width: 220px;">{{ $item->alamat }}</td>
                        <td><span class="badge badge-date">{{ $item->tanggal_berdiri }}</span></td>
                        <td class="text-end pe-3">
                            <a href="{{ route('kopdes.edit', $item->id_kopdes) }}" class="btn btn-warning text-white btn-action me-1">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <form action="{{ route('kopdes.destroy', $item->id_kopdes) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-action" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fa-solid fa-box-open fa-3x text-muted mb-3 d-block"></i>
                            <h6 class="fw-semibold text-muted">Belum ada data Kopdes yang tersimpan</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>