<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    //

    use HasFactory;
    
    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'alamat',
        'jenis_kelamin',
        'Pendidikan_terakhir',
    ];

   public function mataPelajaran()
  {
    return $this->hasMany(MataPelajaran::class, 'nip', 'nip');
  }
}
