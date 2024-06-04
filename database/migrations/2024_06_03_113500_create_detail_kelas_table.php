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
        Schema::create('detail_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('murid_id');
            $table->foreign('kelas_id')->references('id')->on('jadwal_kelas')->onDelete('cascade');
            $table->foreign('murid_id')->references('id')->on('murids')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kelas');
    }
};
