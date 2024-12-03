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
        Schema::create('sosial_media', function (Blueprint $table) {
            $table->bigInteger('id_sosial_media')->primary();
            $table->string('tipe_sosial_media', 25);
            $table->string('link_sosial_media');
            $table->bigInteger('id_tempat_wisata')->index('sosial_media_tempat_wisata_fk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosial_media');
    }
};
