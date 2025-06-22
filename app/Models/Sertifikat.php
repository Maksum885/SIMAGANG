<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    
    protected $fillable = [
        'siswa_id',
        'pembimbing_industri_id', 
        'nama_file',
        'file_path',
        'original_name',
        'file_size',
        'status',
        'keterangan',
        'tanggal_upload'
    ];

    protected $casts = [
        'tanggal_upload' => 'datetime',
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