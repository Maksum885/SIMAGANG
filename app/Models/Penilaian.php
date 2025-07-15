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
        'teknis_json',
        'nonteknis_json',
        'total_teknis',
        'total_nonteknis',
        'total_keseluruhan',
        'grade',
    ];

    protected $casts = [
        'teknis_json' => 'array',
        'nonteknis_json' => 'array',
        'total_teknis' => 'integer',
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
}
