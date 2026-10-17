<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kopdes - Modern UI</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f0f4f9; }
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); }
        .form-control { border-radius: 10px; padding: 10px 14px; border: 1px solid #cbd5e1; }
        .form-control:focus { border-color: #f59e0b; box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15); }
    </style>
</head>
<body>

<div class="container my-5" style="max-width: 600px;">
    <div class="card card-custom p-4 bg-white">
        <div class="card-body">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-warning text-white p-3 rounded-3 me-3">
                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">Edit Data Kopdes</h4>
                    <small class="text-muted">Perbarui informasi Kopdes secara lengkap</small>
                </div>
            </div>

            <form action="{{ route('kopdes.update', $kopdes->id_kopdes) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Toko Kopdes</label>
                    <input type="text" name="nama_toko_kopdes" class="form-control" value="{{ $kopdes->nama_toko_kopdes }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Manajer</label>
                    <input type="text" name="nama_manajer" class="form-control" value="{{ $kopdes->nama_manajer }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $kopdes->alamat }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal Berdiri</label>
                        <input type="date" name="tanggal_berdiri" class="form-control" value="{{ $kopdes->tanggal_berdiri }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Foto Kopdes</label>
                        <input type="file" name="foto_kopdes" class="form-control">
                    </div>
                </div>

                @if($kopdes->foto_kopdes)
                    <div class="p-3 bg-light rounded-3 mb-3 d-flex align-items-center gap-3">
                        <img src="{{ asset('storage/' . $kopdes->foto_kopdes) }}" width="60" height="60" class="rounded-3 object-fit-cover shadow-sm">
                        <span class="small text-muted">Foto saat ini terpasang. Pilih foto baru di atas jika ingin mengganti.</span>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <a href="{{ route('kopdes.index') }}" class="btn btn-light rounded-3 px-4 fw-semibold text-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning text-white rounded-3 px-4 fw-semibold">
                        <i class="fa-solid fa-rotate me-1"></i> Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>