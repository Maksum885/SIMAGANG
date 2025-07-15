<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaGuruPembimbing extends Model
{
    protected $table = 'siswa_guru_pembimbing';

    protected $fillable = [
        'siswa_id',
        'guru_pembimbing_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function guruPembimbing()
    {
        return $this->belongsTo(User::class, 'guru_pembimbing_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
