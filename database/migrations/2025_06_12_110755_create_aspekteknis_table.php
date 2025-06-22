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
        Schema::table('aspek_teknis', function (Blueprint $table) {
            if (!Schema::hasColumn('aspek_teknis', 'siswa_id')) {
                $table->unsignedBigInteger('siswa_id')->nullable()->after('elemen');
                $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            }

            if (!Schema::hasColumn('aspek_teknis', 'pembimbing_industri_id')) {
                $table->unsignedBigInteger('pembimbing_industri_id')->nullable()->after('siswa_id');
                $table->foreign('pembimbing_industri_id')->references('id')->on('pembimbing_industris')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspek_teknis', function (Blueprint $table) {
            // Drop foreign & column hanya jika kolomnya ada
            if (Schema::hasColumn('aspek_teknis', 'siswa_id')) {
                $table->dropForeign(['siswa_id']);
                $table->dropColumn('siswa_id');
            }

            if (Schema::hasColumn('aspek_teknis', 'pembimbing_industri_id')) {
                $table->dropForeign(['pembimbing_industri_id']);
                $table->dropColumn('pembimbing_industri_id');
            }
        });
    }
};
