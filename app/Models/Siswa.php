<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nis',
        'nama_lengkap',
        'kelas',
        'jurusan',
        'email',
        'kontak',
        'periode_mulai',
        'periode_selesai',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPeriodeAttribute()
    {
        if ($this->periode_mulai && $this->periode_selesai) {
            return $this->periode_mulai . ' s/d ' . $this->periode_selesai;
        }
        return '-';
    }
}
