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
        Schema::create('iurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id');
            $table->integer('nominal');
            $table->date('tanggal');
            $table->boolean('status')->default(false);
            $table->foreign('murid_id')->references('id')->on('murids')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**uns
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iurans');
    }
};
