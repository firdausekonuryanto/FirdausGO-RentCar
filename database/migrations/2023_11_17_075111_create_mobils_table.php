<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // mobil : merek, model, no_plat, tarif, sts_sewa
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('model');
            $table->string('no_plat');
            $table->integer('tarif');
            $table->boolean('sts_sewa');
            $table->date('tgl_awal')->nullable();  
            $table->date('tgl_akhir')->nullable();  
            $table->unsignedBigInteger('id_penyewa');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
