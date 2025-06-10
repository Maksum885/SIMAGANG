<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemplateAspekTeknis;

class TemplateAspekTeknisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TemplateAspekTeknis::truncate();

        TemplateAspekTeknis::create([
            'jurusan' => 'Teknik Pemesinan',
            'capaian_pembelajaran' => 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja',
            'elemen' => "1. Gambar Teknik Manufaktur\n2. Teknik Pemesinan Bubut\n3. Teknik Pemesinan Frais\n4. Teknik Pemesinan Gerinda\n5. Teknik Pemesinan Nonkonvensional"
        ]);

        TemplateAspekTeknis::create([
            'jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'capaian_pembelajaran' => 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja',
            'elemen' => "1. Perencanaan dan Pengalamatan Jaringan\n2. Teknologi Jaringan Kabel dan Nirkabel\n3. Keamanan Jaringan\n4. Pemasangan dan KonfigurasI Perangkat Jaringan\n5. Adminitrasi Sistem Jaringan"
        ]);

        TemplateAspekTeknis::create([
            'jurusan' => 'Teknik Kendaraan Ringan Otomotif',
            'capaian_pembelajaran' => 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja',
            'elemen' => "1. Konversi Energi Kendaraan Ringan\n2. Proses Pelayanan dan Manajemen Bengkel Kendaraan Ringan\n3. Prosedur Penggunaan Kendaraan Ringan\n4. Perawatan Berkala Kendaraan Ringan\n5. Sistem Pemindah Tenaga Kendaraaan Ringan"
        ]);

        TemplateAspekTeknis::create([
            'jurusan' => 'Teknik Alat Berat',
            'capaian_pembelajaran' => 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja',
            'elemen' => "1. Model Unit Alat Berat atau Product Knowledge\n2. Gambar Teknik\n3. Diesel Engine Alat Berat\n4. Sistem Kelistrikan Alat Berat\n5. Sistem Hydraulic Alat Berat"
        ]);

        TemplateAspekTeknis::create([
            'jurusan' => 'Teknik Pengelasan',
            'capaian_pembelajaran' => 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja',
            'elemen' => "1. Teknik Gambar\n2. Pengelasan O A W\n3. Pengelasan S M A W\n4. Pengelasan G M A W\n5. Pengelasan F C A W\n6. Pengelasan G T A W\n7. Mutu Pengelasan"
        ]);
    }
}
