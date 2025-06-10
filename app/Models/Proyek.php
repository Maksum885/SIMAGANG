<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyek extends Model
{
    protected $fillable = [
        'nama_proyek',
        'industri_id',
    ];
    
    public function industri()
    {
        return $this->belongsTo(User::class, 'industri_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'proyek_siswa', 'proyek_id', 'siswa_id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
