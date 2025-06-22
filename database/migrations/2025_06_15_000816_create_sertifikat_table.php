<?php
// 1. Migration untuk tabel sertifikat (lengkapi yang sudah ada)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('pembimbing_industri_id')->constrained('pembimbing_industri')->onDelete('cascade');
            $table->string('nama_file');
            $table->string('file_path');
            $table->string('original_name');
            $table->bigInteger('file_size');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('keterangan')->nullable();
            $table->timestamp('tanggal_upload');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sertifikat');
    }
};