<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('guru')->insert([
            [
                'nip'                 => 19900200,
                'nama_guru'           => 'Andriansyah Maulana, S.Kom., M.Kom.',
                'alamat'              => 'Jl. Jati Kecamatan Tarogong Kaler GArut',
                'jenis_kelamin'       => 'Pria',
                'Pendidikan_terakhir' => 'S2 Sistem Informasi',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'nip'                 => 19900202,
                'nama_guru'           => 'Revy Cahya Alamsyah, S.Kom.',
                'alamat'              => 'Perum Dinar Leles Kecamatan Leles Garut',
                'jenis_kelamin'       => 'Wanita',
                'Pendidikan_terakhir' => 'S1 Sistem Informasi',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'nip'                 => 19930303,
                'nama_guru'           => 'Rahmi Aprianti, S.Pd',
                'alamat'              => 'Jl. Tanjung Tarogong Kaler Garut',
                'jenis_kelamin'       => 'Wanita',
                'Pendidikan_terakhir' => 'S1 Pendidikan Teknologi Informasi',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'nip'                 => 19930302,
                'nama_guru'           => 'Asep Ulumudin S.Kom',
                'alamat'              => 'Jl. Cipanas Tarogong Kaler Garut',
                'jenis_kelamin'       => 'Pria',
                'Pendidikan_terakhir' => 'S1 Teknik Informatika',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'nip'                 => 19930301,
                'nama_guru'           => 'A Arief, S.Si., M.Kom',
                'alamat'              => 'Jalan Singaparna Tasikmalaya',
                'jenis_kelamin'       => 'Pria',
                'Pendidikan_terakhir' => 'S2 Sistem Informasi',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
        ]);
    
    }
}
