<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembimbingIndustri extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_industri',
        'bidang_industri',
        'alamat',
        'kontak',
        'nama_pimpinan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
