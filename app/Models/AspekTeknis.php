<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AspekTeknis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan',
        'capaian_pembelajaran',
        'elemen'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'aspek_teknis_user');
    }
}
