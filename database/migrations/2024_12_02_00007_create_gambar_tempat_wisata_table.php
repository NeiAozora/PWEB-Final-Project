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
        Schema::create('gambar_tempat_wisata', function (Blueprint $table) {
            $table->bigInteger('id_gambar_tempat_wisata')->primary()->autoIncrement();;
            $table->string('url_gambar');
            $table->bigInteger('id_tempat_wisata')->index('gambar_tempat_wisata_fk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_tempat_wisata');
    }
};
