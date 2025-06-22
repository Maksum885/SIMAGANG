<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umpan_balik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('pembimbing_industri_id')->constrained('users')->onDelete('cascade');
            $table->text('isi_umpan_balik');
            $table->enum('status', ['draft', 'terkirim'])->default('terkirim');
            $table->timestamp('tanggal_kirim')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umpan_balik');
    }
};