<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruPembimbing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nip',
        'nama_lengkap',
        'jurusan',
        'email',
        'kontak',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
