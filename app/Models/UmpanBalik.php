<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmpanBalik extends Model
{
    protected $table = 'umpan_balik';

    protected $fillable = [
        'siswa_id',
        'pembimbing_industri_id',
        'isi_umpan_balik',
        'status',
        'tanggal_kirim'
    ];

    protected $casts = [
        'tanggal_kirim' => 'datetime',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function pembimbingIndustri(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pembimbing_industri_id');
    }
}
