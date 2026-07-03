<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('master_spesialisasi')) {
            Schema::create('master_spesialisasi', function (Blueprint $table) {
                $table->increments('idspesialisasi');
                $table->string('spesialisasi', 255);
            });
        }

        if (!Schema::hasTable('wid')) {
            Schema::create('wid', function (Blueprint $table) {
                $table->string('nip', 48)->primary();
                $table->string('nama', 128);
                $table->string('pp', 255)->nullable();
            });
        }

        if (!Schema::hasTable('jadwal_alt')) {
            Schema::create('jadwal_alt', function (Blueprint $table) {
                $table->id();
                $table->string('nip', 48);
                $table->string('namadiklat', 255);
                $table->integer('materi')->unsigned();
                $table->foreign('materi')->references('idspesialisasi')->on('master_spesialisasi');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_alt');
        Schema::dropIfExists('wid');
        Schema::dropIfExists('master_spesialisasi');
    }
};
