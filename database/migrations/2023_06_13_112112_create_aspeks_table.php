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
        Schema::create('aspeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLogin');
            $table->foreign('idLogin')->references('id')->on('users')->onDelete('cascade');
            $table->string('aspekNilai');
            $table->integer('bobotCore');
            $table->integer('bobotSecondary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspeks');
    }
};
