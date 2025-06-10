<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama_lengkap' => 'Admin1',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama_lengkap' => 'Pembimbing Industri',
            'username' => 'industri',
            'password' => Hash::make('industri123'),
            'role' => 'pembimbing_industri',
        ]);
        User::create([
            'nama_lengkap' => 'Guru Pembimbing',
            'username' => 'guru',
            'password' => Hash::make('guru123'),
            'role' => 'guru_pembimbing',
        ]);
        User::create([
            'nama_lengkap' => 'Siswa 1',
            'username' => 'siswa',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
        ]);
    }
}
