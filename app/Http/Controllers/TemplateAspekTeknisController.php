<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateAspekTeknis;

class TemplateAspekTeknisController extends Controller
{
     public function getByJurusan($jurusan)
    {
        $template = TemplateAspekTeknis::where('jurusan', $jurusan)->first();

        if ($template) {
            return response()->json([
                'success' => true,
                'data' => $template
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Template tidak ditemukan'
            ]);
        }
    }
}
