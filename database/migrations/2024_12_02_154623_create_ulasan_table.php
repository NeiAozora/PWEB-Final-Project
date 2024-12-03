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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->bigInteger('id_ulasan')->primary();
            $table->integer('nilai_rating')->nullable();
            $table->text('isi_komentar');
            $table->bigInteger('id_tempat_wisata')->index('ulasan_tempat_wisata_fk');
            $table->bigInteger('id_pengguna')->index('ulasan_pengguna_fk');
            $table->bigInteger('id_ulasan_yg_dibalas')->nullable()->index('ulasan_ulasan_fk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
