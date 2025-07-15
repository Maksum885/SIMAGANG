<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    // TETAP GUNAKAN 'siswas' sesuai dengan tabel di database
    protected $table = 'siswas';

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
        'pembimbing_industri_id',
        'guru_pembimbing_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pembimbingIndustri(): BelongsTo
    {
        return $this->belongsTo(PembimbingIndustri::class);
    }
    public function guruPembimbing(): BelongsTo
    {
        return $this->belongsTo(GuruPembimbing::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kegiatans(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function aspekTeknis(): HasMany
    {
        return $this->hasMany(AspekTeknis::class);
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }

    public function getPeriodeAttribute()
    {
        if ($this->periode_mulai && $this->periode_selesai) {
            return $this->periode_mulai . ' s/d ' . $this->periode_selesai;
        }
        return '-';
    }

    public function getAbsensiStats($bulan = null, $tahun = null)
    {
        $query = $this->absensi();

        if ($bulan && $tahun) {
            $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        }

        return [
            'hadir' => $query->where('status', 'hadir')->count(),
            'izin' => $query->whereIn('status', ['izin_sakit', 'izin_keluarga', 'izin_lainnya'])->count(),
            'sakit' => $query->where('status', 'izin_sakit')->count(),
            'alpha' => $query->where('status', 'alpha')->count(),
        ];
    }

    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'siswa_id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'siswa_id');
    }
    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, 'siswa_id');
    }
    
}
