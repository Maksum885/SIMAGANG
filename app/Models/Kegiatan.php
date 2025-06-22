<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'kegiatan',
        'foto',
        'status',
        'catatan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'menunggu' => 'text-yellow-600',
            'disetujui' => 'text-green-600',
            'ditolak' => 'text-red-600',
            default => 'text-gray-600'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'menunggu' => 'Menunggu Verifikasi',
            'disetujui' => 'Terverifikasi',
            'ditolak' => 'Ditolak',
            default => 'Unknown'
        };
    }
}