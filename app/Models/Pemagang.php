<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemagang extends Model
{
    use HasFactory;

    protected $table = 'pemagang';

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'institusi',
        'prodi',
        'email',
        'no_hp',
        'tanggal_mulai_magang',
        'tanggal_selesai_magang'
    ];
}

