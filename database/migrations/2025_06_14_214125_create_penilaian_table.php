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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('pembimbing_industri_id');
            
            // Aspek Teknis
            $table->integer('teknis_pemahaman_alat')->nullable();
            $table->text('teknis_pemahaman_alat_komentar')->nullable();
            $table->integer('teknis_keterampilan')->nullable();
            $table->text('teknis_keterampilan_komentar')->nullable();
            $table->integer('teknis_keselamatan')->nullable();
            $table->text('teknis_keselamatan_komentar')->nullable();
            $table->integer('total_teknis')->nullable();
            
            // Aspek Non-Teknis
            $table->integer('nonteknis_disiplin')->nullable();
            $table->text('nonteknis_disiplin_komentar')->nullable();
            $table->integer('nonteknis_kerjasama')->nullable();
            $table->text('nonteknis_kerjasama_komentar')->nullable();
            $table->integer('nonteknis_inisiatif')->nullable();
            $table->text('nonteknis_inisiatif_komentar')->nullable();
            $table->integer('nonteknis_tanggung_jawab')->nullable();
            $table->text('nonteknis_tanggung_jawab_komentar')->nullable();
            $table->integer('total_nonteknis')->nullable();
             
            $table->integer('total_keseluruhan')->nullable();
            $table->text('catatan_umum')->nullable();
            $table->timestamps();
            
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('pembimbing_industri_id')->references('id')->on('pembimbing_industris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};