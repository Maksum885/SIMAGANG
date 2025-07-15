<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPembimbingIndustri extends Model
{
    protected $table = 'siswa_pembimbing_industri';

    protected $fillable = [
        'siswa_id',
        'pembimbing_industri_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembimbingIndustri()
    {
        return $this->belongsTo(User::class, 'pembimbing_industri_id');
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
