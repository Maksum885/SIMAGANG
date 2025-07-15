<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropColumn([
                'teknis_pemahaman_alat',
                'teknis_pemahaman_alat_komentar',
                'teknis_keterampilan',
                'teknis_keterampilan_komentar',
                'teknis_keselamatan',
                'teknis_keselamatan_komentar',
                'nonteknis_disiplin',
                'nonteknis_disiplin_komentar',
                'nonteknis_kerjasama',
                'nonteknis_kerjasama_komentar',
                'nonteknis_inisiatif',
                'nonteknis_inisiatif_komentar',
                'nonteknis_tanggung_jawab',
                'nonteknis_tanggung_jawab_komentar',
                'catatan_umum'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {
            //
        });
    }
};
