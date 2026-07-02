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
        Schema::create('observasi', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100);
            $table->string('soal1')->nullable();
            $table->string('soal2')->nullable();
            $table->string('soal3')->nullable();
            $table->string('soal4')->nullable();
            $table->string('soal5')->nullable();
            $table->string('soal6')->nullable();
            $table->string('soal7')->nullable();
            $table->text('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasi');
    }
};
