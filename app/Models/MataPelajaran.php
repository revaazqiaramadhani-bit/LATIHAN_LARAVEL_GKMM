<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran_';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'jam_pelajaran',
        'nip',
    ];

    /**
     * Relasi ke Guru via NIP
     */
    public function guru(): BelongsTo
    {
        // Hubungkan nip di mata_pelajaran_ ke nip di tabel guru
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}