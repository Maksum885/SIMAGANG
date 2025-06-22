<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Modifikasi tabel siswa untuk membuat pembimbing_industri_id nullable
     */
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            // Jika kolom sudah ada, ubah menjadi nullable
            $table->foreignId('pembimbing_industri_id')
                  ->nullable()
                  ->change()
                  ->constrained('pembimbing_industris')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->foreignId('pembimbing_industri_id')
                  ->nullable(false)
                  ->change();
        });
    }
};