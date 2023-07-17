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
        Schema::create('komunikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLogin');
            $table->foreign('idLogin')->references('id')->on('users')->onDelete('cascade');
            $table->string('soalKom1');
            $table->string('soalKom2');
            $table->string('soalKom3');
            $table->string('soalKom4');
            $table->string('soalKom5');
            $table->integer('nilaiKom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunikasis');
    }
};
