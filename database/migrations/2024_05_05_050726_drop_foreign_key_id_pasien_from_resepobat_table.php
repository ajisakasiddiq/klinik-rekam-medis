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
        Schema::table('resepobat', function (Blueprint $table) {
              $table->dropForeign(['id_pasien']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resepobat', function (Blueprint $table) {
             $table->foreign('id_pasien')->references('id')->on('pasien');
        });
    }
};
