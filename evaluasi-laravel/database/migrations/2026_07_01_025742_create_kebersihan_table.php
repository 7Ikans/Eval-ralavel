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
        Schema::create('kebersihan', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100);
            $table->string('kelas');
            $table->string('asrama');
            $table->string('soal1');
            $table->string('soal2');
            $table->string('soal3');
            $table->string('soal4');
            $table->string('soal5');
            $table->string('soal6');
            $table->string('soal7');
            $table->string('soal8');
            $table->string('soal9');
            $table->text('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebersihan');
    }
};
