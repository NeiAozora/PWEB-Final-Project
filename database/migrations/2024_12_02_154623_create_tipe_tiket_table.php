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
        Schema::create('tipe_tiket', function (Blueprint $table) {
            $table->bigInteger('id_tipe_tiket')->primary();
            $table->string('nama_tipe', 60);
            $table->bigInteger('id_tempat_wisata')->index('tipe_tiket_tempat_wisata_fk');
            $table->time('waktu_dimulai');
            $table->time('waktu_berakhir');
            $table->double('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_tiket');
    }
};
