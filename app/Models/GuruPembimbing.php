<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuruPembimbing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nip',
        'nama_lengkap',
        'jurusan',
        'email',
        'kontak',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    public function getAbsensiSiswa($bulan = null, $tahun = null)
    {
        $query = Absensi::whereHas('siswa', function ($q) {
            $q->where('guru_pembimbing_id', $this->id);
        });

        if ($bulan && $tahun) {
            $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        }

        return $query->with(['siswa.user'])->get();
    }
}
