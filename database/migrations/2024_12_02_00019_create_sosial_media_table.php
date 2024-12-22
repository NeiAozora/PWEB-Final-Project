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
        // Create the platform_sosial_media table
        Schema::create('platform_sosial_media', function (Blueprint $table) {
            $table->bigInteger('id_platform')->primary()->autoIncrement();;
            $table->string('nama_platform', 25);
        });

        // Create the sosial_media table
        Schema::create('sosial_media', function (Blueprint $table) {
            $table->bigInteger('id_sosial_media')->primary()->autoIncrement();;
            $table->string('link_sosial_media');

            // Foreign key to tempat_wisata table
            $table->bigInteger('id_tempat_wisata');
            $table->foreign('id_tempat_wisata')
                ->references('id_tempat_wisata') // Reference column in tempat_wisata
                ->on('tempat_wisata')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Foreign key to platform_sosial_media table
            $table->bigInteger('id_platform');
            $table->foreign('id_platform')
                ->references('id_platform') // Reference column in platform_sosial_media
                ->on('platform_sosial_media')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop sosial_media table first (to remove dependencies)
        Schema::table('sosial_media', function (Blueprint $table) {
            $table->dropForeign(['id_tempat_wisata']);
            $table->dropForeign(['id_platform']);
        });
        Schema::dropIfExists('sosial_media');

        // Drop platform_sosial_media table
        Schema::dropIfExists('platform_sosial_media');
    }
};
