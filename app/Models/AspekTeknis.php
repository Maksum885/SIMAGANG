<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AspekTeknis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan',
        'capaian_pembelajaran',
        'elemen',
        'siswa_id',
        'pembimbing_industri_id'
    ];

    // Relasi dengan Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi dengan Pembimbing Industri
    public function pembimbingIndustri()
    {
        return $this->belongsTo(PembimbingIndustri::class);
    }
}