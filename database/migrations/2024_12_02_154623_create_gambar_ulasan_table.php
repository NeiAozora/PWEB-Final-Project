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
        Schema::create('gambar_ulasan', function (Blueprint $table) {
            $table->bigInteger('id_gambar_ulasan')->primary();
            $table->string('url_gambar');
            $table->bigInteger('id_ulasan')->index('gambar_ulasan_ulasan_fk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_ulasan');
    }
};
