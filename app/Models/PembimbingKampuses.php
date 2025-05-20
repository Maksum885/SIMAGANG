<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class PembimbingKampuses extends Model
{
    use HasFactory;

    protected $table = 'pembimbing_kampus';

    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'institusi',
        'prodi',
        'nidn',
        'email',
        'no_hp',
        
    ];
}