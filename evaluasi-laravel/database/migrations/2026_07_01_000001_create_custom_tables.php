<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        // ==========================================================
        // Tabel utama — dipakai AdminController (dashboard, sidebar, tabel)
        // ==========================================================
        if (!Schema::hasTable('evaluasi')) {
            Schema::create('evaluasi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('jenis_diklat', 50);
                $table->string('nama_diklat', 255);
                $table->year('tahun')->nullable();
                $table->char('link_selenggara', 100);
                $table->string('link_widya', 100);
                $table->string('link_pasca', 30);
                $table->integer('status_selenggara');
                $table->integer('status_widya');
                $table->integer('status_pasca');
                $table->integer('jmlh');
                $table->string('metode_pelatihan', 64);
                $table->timestamp('lastupdate')->useCurrent()->useCurrentOnUpdate();
 
                $table->index(['jenis_diklat', 'tahun']);
                $table->index('metode_pelatihan');
            });
        }
 
        // ==========================================================
        // Hasil Evaluasi Tenaga Pengajar 2024
        // ==========================================================
        if (!Schema::hasTable('hasilevaluasitp_2024')) {
            Schema::create('hasilevaluasitp_2024', function (Blueprint $table) {
                $table->increments('idhasil');
                $table->integer('id_diklat_daftar_online');
                $table->string('jenisdiklat', 128)->nullable();
                $table->string('namadiklat', 255);
                $table->year('tahun');
                $table->string('nipwi', 48);
                $table->string('namawi', 128);
                $table->string('materi', 255);
                $table->timestamp('tglmasuk')->useCurrent();
                $table->string('hasil1', 32)->comment('Penguasaan materi');
                $table->string('hasil2', 32)->comment('Sistematika penyajian materi');
                $table->string('hasil3', 32)->comment('Ketepatan waktu dan kehadiran');
                $table->string('hasil4', 32)->comment('Penggunaan media / sarana pembelajaran');
                $table->string('hasil5', 32)->comment('Penggunaan metode pembelajaran');
                $table->string('hasil6', 32)->comment('Sikap dan perilaku saat mengajar');
                $table->string('hasil7', 32)->comment('Penggunaan bahasa saat mengajar');
                $table->string('hasil8', 32)->comment('Sikap dan perilaku saat bertanya/menjawab');
                $table->string('hasil9', 32)->comment('Penggunaan bahasa saat bertanya/menjawab');
                $table->string('hasil10', 32)->comment('Sikap dan perilaku saat memberi motivasi');
                $table->string('hasil11', 32)->comment('Penggunaan bahasa saat memberi motivasi');
                $table->string('hasil12', 32)->comment('Kecakapan menciptakan kondusivitas kelas');
                $table->string('hasil13', 32)->comment('Kecakapan menjaga situasi kelas dinamis');
                $table->string('hasil14', 32)->nullable()->comment('Kerjasama antar Widyaiswara (team teaching)');
                $table->text('saran')->nullable();
                $table->string('nip_peserta', 24);
                $table->string('nama_peserta', 128);
                $table->dateTime('timestamp')->nullable();
 
                $table->index(['namadiklat', 'tahun', 'nipwi']);
                $table->index('materi');
            });
        }
 
        // ==========================================================
        // Tabel-tabel form Evaluasi Penyelenggaraan (form.php - form7.php)
        // ==========================================================
        if (!Schema::hasTable('relevan')) {
            Schema::create('relevan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('catatan', 100);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('pelayanan')) {
            Schema::create('pelayanan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('catatan', 100);
                $table->string('nama_diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('pelayanan_peserta')) {
            Schema::create('pelayanan_peserta', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('soal6', 100);
                $table->string('soal7', 100);
                $table->string('catatan', 100);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('kebersihan')) {
            Schema::create('kebersihan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kelas', 100);
                $table->string('asrama', 100);
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('soal6', 100);
                $table->string('soal7', 100);
                $table->string('soal8', 100);
                $table->string('soal9', 100);
                $table->string('catatan', 100);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('keberfungsian')) {
            Schema::create('keberfungsian', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('soal6', 100);
                $table->string('soal7', 100);
                $table->string('catatan', 200);
                $table->string('diklat', 200);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('ketersediaan')) {
            Schema::create('ketersediaan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('catatan', 1000);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('perlengkapan')) {
            Schema::create('perlengkapan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('catatan', 1000);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('konsumsi')) {
            Schema::create('konsumsi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ruang', 100);
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('catatan', 1000);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
 
        if (!Schema::hasTable('observasi')) {
            Schema::create('observasi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('soal1', 100);
                $table->string('soal2', 100);
                $table->string('soal3', 100);
                $table->string('soal4', 100);
                $table->string('soal5', 100);
                $table->string('soal6', 100);
                $table->string('soal7', 100);
                $table->string('catatan', 1000);
                $table->string('diklat', 100);
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }
 
    public function down(): void
    {
        Schema::dropIfExists('observasi');
        Schema::dropIfExists('konsumsi');
        Schema::dropIfExists('perlengkapan');
        Schema::dropIfExists('ketersediaan');
        Schema::dropIfExists('keberfungsian');
        Schema::dropIfExists('kebersihan');
        Schema::dropIfExists('pelayanan_peserta');
        Schema::dropIfExists('pelayanan');
        Schema::dropIfExists('relevan');
        Schema::dropIfExists('hasilevaluasitp_2024');
        Schema::dropIfExists('evaluasi');
    }
};