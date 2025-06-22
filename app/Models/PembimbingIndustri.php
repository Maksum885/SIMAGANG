<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PembimbingIndustri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_industri',
        'bidang_industri',
        'alamat',
        'kontak',
        'nama_pimpinan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function aspekTeknis(): HasMany
    {
        return $this->hasMany(AspekTeknis::class);
    }

    // TAMBAHKAN RELASI KE SISWA
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    // TAMBAHKAN METHOD UNTUK MENDAPATKAN ABSENSI SISWA
    public function getAbsensiSiswa($bulan = null, $tahun = null)
    {
        $query = Absensi::whereHas('siswa', function($q) {
            $q->where('pembimbing_industri_id', $this->id);
        });

        if ($bulan && $tahun) {
            $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        }

        return $query->with(['siswa.user'])->get();
    }
    public function getPenilaianSiswa()
    {
        return $this->hasMany(Penilaian::class, 'pembimbing_industri_id');
    }

    public function getSertifikatSiswa()
    {
        return $this->hasMany(Sertifikat::class, 'pembimbing_industri_id');
    }
    

}