<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diklat', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50)->nullable();
        });

        Schema::create('data_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50)->nullable();
            $table->string('nama', 200)->nullable();
            $table->string('jns_diklat', 100)->nullable();
            $table->date('tgl_mulai')->nullable();
        });

        Schema::create('hasilevaluasitp_2024', function (Blueprint $table) {
            $table->id('idhasil');
            $table->integer('id_diklat_daftar_online')->nullable();
            $table->string('jenisdiklat', 128)->nullable();
            $table->string('namadiklat', 255)->nullable();
            $table->integer('tahun')->nullable();
            $table->string('nipwi', 48)->nullable();
            $table->string('namawi', 128)->nullable();
            $table->string('materi', 255)->nullable();
            $table->string('hasil1', 50)->nullable();
            $table->string('hasil2', 50)->nullable();
            $table->string('hasil3', 50)->nullable();
            $table->string('hasil4', 50)->nullable();
            $table->string('hasil5', 50)->nullable();
            $table->string('hasil6', 50)->nullable();
            $table->string('hasil7', 50)->nullable();
            $table->string('hasil8', 50)->nullable();
            $table->string('hasil9', 50)->nullable();
            $table->string('hasil10', 50)->nullable();
            $table->string('hasil11', 50)->nullable();
            $table->string('hasil12', 50)->nullable();
            $table->string('hasil13', 50)->nullable();
            $table->string('hasil14', 50)->nullable();
            $table->text('saran')->nullable();
            $table->string('nip_peserta', 24)->nullable();
            $table->string('nama_peserta', 128)->nullable();
            $table->dateTime('timestamp')->nullable();
        });

        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('pelayanan_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->string('soal6', 50)->nullable();
            $table->string('soal7', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('kebersihan', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('kelas', 50)->nullable();
            $table->string('asrama', 50)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->string('soal6', 50)->nullable();
            $table->string('soal7', 50)->nullable();
            $table->string('soal8', 50)->nullable();
            $table->string('soal9', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('keberfungsian', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->string('soal6', 50)->nullable();
            $table->string('soal7', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('ketersediaan', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('perlengkapan', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('konsumsi', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('ruang', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('observasi', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->string('soal4', 50)->nullable();
            $table->string('soal5', 50)->nullable();
            $table->string('soal6', 50)->nullable();
            $table->string('soal7', 50)->nullable();
            $table->text('catatan')->nullable();
        });

        Schema::create('relevan', function (Blueprint $table) {
            $table->id();
            $table->string('diklat', 100)->nullable();
            $table->string('soal1', 50)->nullable();
            $table->string('soal2', 50)->nullable();
            $table->string('soal3', 50)->nullable();
            $table->text('catatan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relevan');
        Schema::dropIfExists('observasi');
        Schema::dropIfExists('konsumsi');
        Schema::dropIfExists('perlengkapan');
        Schema::dropIfExists('ketersediaan');
        Schema::dropIfExists('keberfungsian');
        Schema::dropIfExists('kebersihan');
        Schema::dropIfExists('pelayanan_peserta');
        Schema::dropIfExists('pelayanan');
        Schema::dropIfExists('hasilevaluasitp_2024');
        Schema::dropIfExists('data_pesertas');
        Schema::dropIfExists('diklat');
    }
};
