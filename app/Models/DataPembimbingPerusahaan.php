<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembimbingPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'data_pembimbing_perusahaans';

    protected $primaryKey = 'id_karyawan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        
        'nama',
        'nama_perusahaan',
        'id_karyawan',
        'email',
        'kontak',
        
    ];
}
