<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = [
            'Teknik Pemesinan',
            'Teknik Jaringan Komputer dan Telekomunikasi',
            'Teknik Kendaraan Ringan Otomotif',
            'Teknik Alat Berat',
            'Teknik Pengelasan',
        ];

        foreach ($jurusan as $nama) {
            Jurusan::create(['nama' => $nama]);
        }
    }
}
