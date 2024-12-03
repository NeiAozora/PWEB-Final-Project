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
        Schema::create('kategori_wisata', function (Blueprint $table) {
            $table->bigInteger('id_kategori');
            $table->bigInteger('id_tempat_wisata')->index('kategori_tempat_wisata_fk');

            $table->primary(['id_kategori', 'id_tempat_wisata']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_wisata');
    }
};
