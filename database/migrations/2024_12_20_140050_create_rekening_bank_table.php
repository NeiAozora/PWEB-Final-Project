<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

        public function up()
        {
            // Create Rekening_Bank table
            Schema::create('rekening_bank', function (Blueprint $table) {
                $table->bigInteger('id_rekening_bank')->primary()->autoIncrement();
                $table->string('nama_bank', 100); // Name of the bank
                $table->string('nomer_rekening', 50); // Account number

                $table->bigInteger('id_tempat_wisata')->nullable()->index('tempat_wisata_tempat_wisata_fk');

                $table->foreign('id_tempat_wisata')
                    ->references('id_tempat_wisata')
                    ->on('tempat_wisata')
                    ->nullOnDelete();

                $table->timestamps(); // For created_at and updated_at
            });


            // Add foreign key to Pembayaran
            Schema::table('pembayaran', function (Blueprint $table) {
                $table->bigInteger('id_rekening_bank')->nullable()->index('pembayaran_rekening_bank_fk');

                $table->foreign('id_rekening_bank')
                    ->references('id_rekening_bank')
                    ->on('rekening_bank')
                    ->nullOnDelete();
            });
        }

        public function down()
        {
            // Drop foreign key from Tempat_Wisata
            Schema::table('rekening_bank', function (Blueprint $table) {
                $table->dropForeign('rekening_bank_tempat_wisata_fk');
                $table->dropColumn('id_tempat_wisata');
            });

            // Drop foreign key from Pembayaran
            Schema::table('pembayaran', function (Blueprint $table) {
                $table->dropForeign('pembayaran_rekening_bank_fk');
                $table->dropColumn('id_rekening_bank');
            });

            // Drop Rekening_Bank table
            Schema::dropIfExists('rekening_bank');
        }
    }
;
