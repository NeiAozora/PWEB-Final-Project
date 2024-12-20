<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create Pesanan_Tiket table first
        Schema::create('pesanan_tiket', function (Blueprint $table) {
            $table->bigInteger('id_pesanan')->primary()->autoIncrement(); // Primary key with auto increment
            $table->bigInteger('id_pengguna')->index(); // Foreign key to pengguna
            $table->timestamp('dibuat_saat'); // Timestamp for when the order was made
            $table->string('status', 20); // Status of the order (e.g., ordered, paid, cancelled)
            $table->timestamps(); // For created_at and updated_at

            // Foreign key
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });

        // Create Tiket table
        Schema::create('tiket', function (Blueprint $table) {
            $table->bigInteger('id_tiket')->primary()->autoIncrement(); // Primary key with auto increment
            $table->bigInteger('id_tipe_tiket')->index(); // Foreign key to tipe_tiket
            $table->bigInteger('id_pesanan_tiket')->index(); // Foreign key to pesanan_tiket
            $table->integer('jumlah_tiket'); // Number of tickets ordered
            $table->decimal('harga_per_unit', 10, 2); // Total price for the tickets ordered
            $table->timestamp('dibuat_saat'); // Timestamp for created time
            $table->timestamp('berlaku_sampai'); // Timestamp for expiration time
            $table->string('status', 10); // Status of the ticket (e.g., active, used, expired)
            $table->timestamps(); // For created_at and updated_at

            // Foreign keys
            $table->foreign('id_tipe_tiket')->references('id_tipe_tiket')->on('tipe_tiket');
            $table->foreign('id_pesanan_tiket')->references('id_pesanan')->on('pesanan_tiket');
        });

        // Create Pembayaran table
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigInteger('id_pembayaran')->primary()->autoIncrement(); // Primary key with auto increment
            $table->bigInteger('id_pesanan')->index(); // Foreign key to pesanan_tiket
            $table->string('bukti_pembayaran', 255); // Path or URL to the proof of payment image
            // $table->string('status', 20); // Payment status (e.g., pending, completed)
            $table->timestamp('dibuat_saat'); // Timestamp for when the payment was made
            $table->timestamps(); // For created_at and updated_at

            // Foreign key
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan_tiket');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('tiket');
        Schema::dropIfExists('pesanan_tiket');
    }
};
