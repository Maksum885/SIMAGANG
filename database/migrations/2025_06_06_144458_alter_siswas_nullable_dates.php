<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->date('periode_mulai')->nullable()->change();
            $table->date('periode_selesai')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->date('periode_mulai')->nullable(false)->change();
            $table->date('periode_selesai')->nullable(false)->change();
        });
    }
};
