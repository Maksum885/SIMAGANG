<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateAspekTeknis extends Model
{
    protected $table = 'template_aspek_teknis';

    protected $fillable = ['jurusan', 'capaian_pembelajaran', 'elemen'];
}
