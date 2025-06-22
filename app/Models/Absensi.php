<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $table = 'absensi';
    
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam_masuk' => 'datetime:H:i',
        'jam_keluar' => 'datetime:H:i'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    // Helper methods
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'hadir' => 'bg-green-100 text-green-700',
            'izin_sakit' => 'bg-yellow-100 text-yellow-700',
            'izin_keluarga' => 'bg-yellow-100 text-yellow-700',
            'izin_lainnya' => 'bg-yellow-100 text-yellow-700',
            'alpha' => 'bg-red-100 text-red-700'
        ];
        
        return $badges[$this->status] ?? 'bg-gray-100 text-gray-700';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'hadir' => 'Hadir',
            'izin_sakit' => 'Izin Sakit',
            'izin_keluarga' => 'Izin Keluarga',
            'izin_lainnya' => 'Izin Lainnya',
            'alpha' => 'Alpha'
        ];
        
        return $texts[$this->status] ?? 'Unknown';
    }
}