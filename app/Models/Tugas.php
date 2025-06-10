<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id',
        'judul',
        'deskripsi',
        'deadline',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'tugas_siswa', 'tugas_id', 'siswa_id')
            ->withPivot('status')
            ->withTimestamps();
    }
}
