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
        Schema::create('input_giats', function (Blueprint $table) {
            $table->id();
            $table->string('nomorKegiatan');
            $table->date('tanggalKegiatan');
            $table->time('waktuKeberangkatan');
            $table->string('jenisKegiatan');
            $table->string('unitKendaraan');
            $table->string('namaPemohon');
            $table->string('nomorPemohon');
            $table->string('penjemputan');
            $table->string('pengantaran');
            $table->string('tingkatKasus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_giats');
    }
};
