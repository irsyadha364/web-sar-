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
        Schema::create('lapor_latihs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLogin');
            $table->foreign('idLogin')->references('id')->on('users')->onDelete('cascade');
            $table->string('namaKegiatan');
            $table->string('divPel');
            $table->date('tanggalKegiatan');
            $table->string('peran');
            $table->string('dokumentasi')->default('belom ada dokumentasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_latihs');
    }
};
