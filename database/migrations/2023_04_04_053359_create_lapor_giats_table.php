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
        Schema::create('lapor_giats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLogin');
            $table->foreign('idLogin')->references('id')->on('users')->onDelete('cascade');
            $table->string('nomorKegiatan');
            $table->date('tanggalKegiatan');
            $table->time('waktuKeberangkatan');
            $table->string('jenisKegiatan');
            $table->string('namaPetugas');
            $table->string('divPeng');
            $table->string('unitKendaraan');
            $table->string('namaPemohon');
            $table->string('nomorPemohon');
            $table->string('penjemputan');
            $table->string('pengantaran');
            $table->string('dokumentasi')->default('belom ada dokumentasi');
            $table->string('dataPendukung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_giats');
    }
};
