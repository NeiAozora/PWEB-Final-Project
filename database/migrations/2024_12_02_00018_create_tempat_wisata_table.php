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
        Schema::create('tempat_wisata', function (Blueprint $table) {
            $table->bigInteger('id_tempat_wisata')->primary()->autoIncrement();;
            $table->string('nama', 160);
            $table->text('deskripsi')->nullable();
            $table->string('link_gmaps', 512);
            $table->bigInteger('id_pengguna')->index('tempat_wisata_pengguna_fk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_wisata');
    }
};
