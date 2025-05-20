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
        Schema::create('pembimbing_kampus', function (Blueprint $table) {
            $table->string('nama');
            $table->string('institusi');
            $table->string('prodi');
            $table->string('nidn')->primary();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_kampus');
    }
};
