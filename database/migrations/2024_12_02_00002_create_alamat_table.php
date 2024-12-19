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
        Schema::create('alamat', function (Blueprint $table) {
            $table->bigInteger('id_alamat')->primary()->autoIncrement();
            $table->string('jalan', 90)->nullable();
            $table->string('dusun', 40)->nullable();
            $table->string('desa', 40)->nullable();
            $table->string('kecamatan', 40);
            $table->string('kota', 50);
            $table->string('kabupaten', 50);
            $table->string('provinsi', 50);
            $table->bigInteger('id_tempat_wisata')->unique('alamat_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
