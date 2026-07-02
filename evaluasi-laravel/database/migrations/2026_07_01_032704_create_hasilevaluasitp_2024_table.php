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
        Schema::create('hasilevaluasitp_2024', function (Blueprint $table) {
            $table->id('idhasil');
            $table->integer('id_diklat_daftar_online');
            $table->string('jenisdiklat', 128)->nullable();
            $table->string('namadiklat', 255);
            $table->integer('tahun');
            $table->string('nipwi', 48);
            $table->string('namawi', 128);
            $table->string('materi', 255);
            $table->string('hasil1');
            $table->string('hasil2');
            $table->string('hasil3');
            $table->string('hasil4');
            $table->string('hasil5');
            $table->string('hasil6');
            $table->string('hasil7');
            $table->string('hasil8');
            $table->string('hasil9');
            $table->string('hasil10');
            $table->string('hasil11');
            $table->string('hasil12');
            $table->string('hasil13');
            $table->string('hasil14')->nullable();
            $table->text('saran')->nullable();
            $table->string('nip_peserta', 24);
            $table->string('nama_peserta', 128);
            $table->timestamp('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasilevaluasitp_2024');
    }
};
