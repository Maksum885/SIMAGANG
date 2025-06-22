<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;

class SiswaPembimbingSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh: Assign siswa ke pembimbing industri
        $pembimbingIndustri = PembimbingIndustri::first();
        
        if ($pembimbingIndustri) {
            // Update semua siswa atau siswa tertentu
            Siswa::whereNull('pembimbing_industri_id')
                ->limit(10) // Batasi atau sesuaikan
                ->update([
                    'pembimbing_industri_id' => $pembimbingIndustri->id
                ]);
        }
    }
}