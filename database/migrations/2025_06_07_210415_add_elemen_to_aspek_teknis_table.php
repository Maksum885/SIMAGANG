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
            $table->text('elemen')->after('capaian_pembelajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspek_teknis', function (Blueprint $table) {
            $table->dropColumn('elemen');
        });
    }
};
