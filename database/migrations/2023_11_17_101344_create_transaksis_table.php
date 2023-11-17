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
        // transaksi_sewa : id_penyewa, id_mobil, tgl_awal, tgl_akhir, jml_hari, total_sewa
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyewa');
            $table->unsignedBigInteger('id_mobil');
            $table->date('tgl_awal')->nullable();  
            $table->date('tgl_akhir')->nullable();  
            $table->integer('jml_hari')->nullable();  
            $table->integer('total_sewa')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
