<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;   

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'kontak',
        'role',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    /**
     * Check if user is mahasiswa
     */
    public function isMahasiswa()
    {
        return $this->role->name === 'mahasiswa';
    }

    /**
     * Check if user is pembimbing perusahaan
     */
    public function isPembimbingPerusahaan()
    {
        return $this->role->name === 'pembimbing_perusahaan';
    }

    /**
     * Check if user is pembimbing kampus
     */
    public function isPembimbingKampus()
    {
        return $this->role->name === 'pembimbing_kampus';
    }
}