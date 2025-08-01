<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->foreignId('pembimbing_industri_id')
                  ->nullable()
                  ->after('periode_selesai')
                  ->constrained('pembimbing_industris')
                  ->onDelete('set null');
        });
    }

    public function down(): void
{
    Schema::table('siswas', function (Blueprint $table) {
        // Hapus foreign key dulu
        $table->dropForeign(['pembimbing_industri_id']);
        // Baru hapus kolom
        $table->dropColumn('pembimbing_industri_id');
    });
}


};
