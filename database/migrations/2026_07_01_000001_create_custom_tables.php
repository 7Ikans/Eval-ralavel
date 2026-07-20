<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        // ==========================================================
        // Tabel legacy (sebelum ada pemisahan per tahun)
        // ==========================================================
        if (!Schema::hasTable('hasilevaluasitp')) {
            Schema::create('hasilevaluasitp', function (Blueprint $table) {
                $table->increments('idhasil');
                $table->string('namadiklat', 255)->nullable();
                $table->year('tahun')->nullable();
                $table->string('nipwi', 48)->nullable();
                $table->string('materi', 255)->nullable();
                $table->timestamp('tglmasuk')->nullable()->useCurrent();
                $table->string('hasil1', 255)->nullable();
                $table->string('hasil2', 255)->nullable();
                $table->string('hasil3', 255)->nullable();
                $table->string('hasil4', 255)->nullable();
                $table->string('hasil5', 255)->nullable();
                $table->text('saran')->nullable();
                $table->boolean('availability')->default(false);
                $table->string('ipaddress', 64)->nullable();
            });
        }
 
        // ==========================================================
        // Hasil Evaluasi Tenaga Pengajar 2022
        // ==========================================================
        if (!Schema::hasTable('hasilevaluasitp_2022')) {
            Schema::create('hasilevaluasitp_2022', function (Blueprint $table) {
                $table->increments('idhasil');
                $table->integer('id_diklat_daftar_online')->nullable();
                $table->string('jenisdiklat', 128)->nullable();
                $table->string('namadiklat', 255);
                $table->year('tahun');
                $table->string('nipwi', 48);
                $table->string('namawi', 128);
                $table->string('materi', 255);
                $table->timestamp('tglmasuk')->useCurrent();
                $table->string('hasil1', 32)->comment('Kerapihan berpakaian');
                $table->string('hasil2', 32)->comment('Sikap dan perilaku');
                $table->string('hasil3', 32)->comment('Pemberian motivasi kepada peserta');
                $table->string('hasil4', 32)->comment('Kerjasama antar Widyaiswara');
                $table->string('hasil5', 32)->comment('Penguasaan materi');
                $table->string('hasil6', 32)->comment('Sistematika penyajian dan kemampuan menyajikan');
                $table->string('hasil7', 32)->comment('Penggunaan metode dan sarana pelatihan');
                $table->string('hasil8', 32)->comment('Pencapaian tujuan pembelajaran');
                $table->string('hasil9', 32)->comment('Pengaplikasian metode dan media pembelajaran');
                $table->string('hasil10', 32)->comment('Ketepatan waktu dan kehadiran');
                $table->string('hasil11', 32)->comment('Ketuntasan penyampaian materi');
                $table->string('hasil12', 32)->comment('Pemberian umpan balik dan menjawab pertanyaan');
                $table->string('hasil13', 32)->comment('Penggunaan bahasa yang jelas dan mudah dipahami');
                $table->text('saran')->nullable();
                $table->string('nip_peserta', 24)->nullable();
                $table->string('nama_peserta', 128)->nullable();
                $table->dateTime('timestamp')->nullable();
 
                $table->index(['namadiklat', 'tahun', 'nipwi']);
            });
        }
 
        // ==========================================================
        // Hasil Evaluasi Tenaga Pengajar - E-learning
        // ==========================================================
        if (!Schema::hasTable('hasilevaluasitp_el')) {
            Schema::create('hasilevaluasitp_el', function (Blueprint $table) {
                $table->increments('idhasil');
                $table->string('namadiklat', 255);
                $table->year('tahun');
                $table->string('nipwi', 48);
                $table->string('namawi', 128);
                $table->string('materi', 255);
                $table->timestamp('tglmasuk')->useCurrent();
                $table->string('hasil1', 32);
                $table->string('hasil2', 32);
                $table->string('hasil3', 32);
                $table->string('hasil4', 32);
                $table->string('hasil5', 32);
                $table->string('hasil6', 32);
                $table->string('hasil7', 32);
                $table->text('saran')->nullable();
                $table->boolean('availability')->default(false);
                $table->string('ipaddress', 64)->nullable();
 
                $table->index(['namadiklat', 'tahun', 'nipwi']);
            });
        }
    }
 
    public function down(): void
    {
        Schema::dropIfExists('hasilevaluasitp_el');
        Schema::dropIfExists('hasilevaluasitp_2022');
        Schema::dropIfExists('hasilevaluasitp');
    }
};