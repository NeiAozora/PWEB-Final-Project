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
        Schema::table('sosial_media', function (Blueprint $table) {
            $table->foreign(['id_tempat_wisata'], 'sosial_media_tempat_wisata_fk')->references(['id_tempat_wisata'])->on('tempat_wisata')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sosial_media', function (Blueprint $table) {
            $table->dropForeign('sosial_media_tempat_wisata_fk');
        });
    }
};