<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    
    protected $fillable = [
        'siswa_id',
        'pembimbing_industri_id',
        'teknis_pemahaman_alat',
        'teknis_pemahaman_alat_komentar',
        'teknis_keterampilan',
        'teknis_keterampilan_komentar',
        'teknis_keselamatan',
        'teknis_keselamatan_komentar',
        'total_teknis',
        'nonteknis_disiplin',
        'nonteknis_disiplin_komentar',
        'nonteknis_kerjasama',
        'nonteknis_kerjasama_komentar',
        'nonteknis_inisiatif',
        'nonteknis_inisiatif_komentar',
        'nonteknis_tanggung_jawab',
        'nonteknis_tanggung_jawab_komentar',
        'total_nonteknis',
        'total_keseluruhan',
        'catatan_umum'
    ];

    protected $casts = [
        'teknis_pemahaman_alat' => 'integer',
        'teknis_keterampilan' => 'integer',
        'teknis_keselamatan' => 'integer',
        'total_teknis' => 'integer',
        'nonteknis_disiplin' => 'integer',
        'nonteknis_kerjasama' => 'integer',
        'nonteknis_inisiatif' => 'integer',
        'nonteknis_tanggung_jawab' => 'integer',
        'total_nonteknis' => 'integer',
        'total_keseluruhan' => 'integer',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembimbingIndustri(): BelongsTo
    {
        return $this->belongsTo(PembimbingIndustri::class);
    }

    // Accessor untuk mendapatkan nilai rata-rata
    public function getRataRataTeknisAttribute()
    {
        $total = 0;
        $count = 0;
        
        if ($this->teknis_pemahaman_alat) { $total += $this->teknis_pemahaman_alat; $count++; }
        if ($this->teknis_keterampilan) { $total += $this->teknis_keterampilan; $count++; }
        if ($this->teknis_keselamatan) { $total += $this->teknis_keselamatan; $count++; }
        
        return $count > 0 ? round($total / $count, 2) : 0;
    }

    public function getRataRataNonTeknisAttribute()
    {
        $total = 0;
        $count = 0;
        
        if ($this->nonteknis_disiplin) { $total += $this->nonteknis_disiplin; $count++; }
        if ($this->nonteknis_kerjasama) { $total += $this->nonteknis_kerjasama; $count++; }
        if ($this->nonteknis_inisiatif) { $total += $this->nonteknis_inisiatif; $count++; }
        if ($this->nonteknis_tanggung_jawab) { $total += $this->nonteknis_tanggung_jawab; $count++; }
        
        return $count > 0 ? round($total / $count, 2) : 0;
    }

    public function getNilaiAkhirAttribute()
    {
        $rata_teknis = $this->rata_rata_teknis;
        $rata_nonteknis = $this->rata_rata_non_teknis;
        
        if ($rata_teknis > 0 && $rata_nonteknis > 0) {
            return round(($rata_teknis + $rata_nonteknis) / 2, 2);
        }
        
        return 0;
    }

    public function getGradeAttribute()
    {
        $nilai = $this->nilai_akhir;
        
        if ($nilai >= 9) return 'A';
        if ($nilai >= 8) return 'B';
        if ($nilai >= 7) return 'C';
        if ($nilai >= 6) return 'D';
        return 'E';
    }
}