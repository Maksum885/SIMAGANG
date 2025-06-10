<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\PembimbingIndustri;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'username',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pembimbingIndustri()
    {
        return $this->hasOne(PembimbingIndustri::class);
    }

    public function guruPembimbing()
    {
        return $this->hasOne(GuruPembimbing::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function aspekTeknis()
    {
        return $this->belongsToMany(AspekTeknis::class, 'aspek_teknis_user');
    }
}
