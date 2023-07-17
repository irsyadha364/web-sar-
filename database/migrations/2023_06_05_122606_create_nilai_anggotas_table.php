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
        Schema::create('nilai_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLogin');
            $table->foreign('idLogin')->references('id')->on('users')->onDelete('cascade');
            $table->integer('pengPara');
            $table->integer('pengNavi');
            $table->integer('pengEvak');
            $table->integer('pengPosko');
            $table->integer('pelPara');
            $table->integer('pelNavi');
            $table->integer('pelEvak');
            $table->integer('pelPosko');
            $table->float('nilaiAkhir')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_anggotas');
    }
};
