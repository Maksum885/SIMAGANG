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
        // Schema::create('template_aspek_teknis', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('jurusan');
        //     $table->text('capaian_pembelajaran');
        //     $table->text('elemen');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_aspek_teknis');
    }
};