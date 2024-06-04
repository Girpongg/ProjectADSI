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
        Schema::create('upload_moduls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelajaran');
            $table->unsignedBigInteger('id_angkatan');
            $table->string('file');
            $table->foreign('id_angkatan')->references('id')->on('ruang_kelas')->onDelete('cascade');
            $table->foreign('id_pelajaran')->references('id')->on('mata_pelajarans')->onDelete('cascade');
            $table->string('materipelajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_moduls');
    }
};
