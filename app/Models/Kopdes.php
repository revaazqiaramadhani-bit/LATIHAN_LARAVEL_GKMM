<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kopdes extends Model
{
    use HasFactory;

    protected $table = 'kopdes';
    protected $primaryKey = 'id_kopdes'; // Menentukan Primary Key kustom kamu

    protected $fillable = [
        'nama_toko_kopdes',
        'nama_manajer',
        'alamat',
        'tanggal_berdiri',
        'foto_kopdes',
    ];
}