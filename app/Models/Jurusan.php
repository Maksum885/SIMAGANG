<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    protected $fillable = [
        'nama_jurusan',
    ];

    // Relasi dengan Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    // Relasi dengan Pembimbing Industri
    public function pembimbingIndustri()
    {
        return $this->hasMany(PembimbingIndustri::class);
    }

    // Relasi dengan Aspek Teknis
    public function aspekTeknis()
    {
        return $this->hasMany(AspekTeknis::class);
    }
}
