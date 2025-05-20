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
        Schema::create('data_pembimbing_perusahaans', function (Blueprint $table) {
            $table->string('id_karyawan', 20)->primary();
            $table->string('nama', 50);
            $table->string('nama_perusahaan', 50);
            $table->string('email', 50)->unique();
            $table->string('kontak', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pembimbing_perusahaans');
    }
};
