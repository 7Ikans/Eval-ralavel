<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilEvaluasiTp extends Model
{
    protected $table = 'hasilevaluasitp_2024';
    protected $primaryKey = 'idhasil';
    public $timestamps = false;

    protected $fillable = [
        'id_diklat_daftar_online',
        'jenisdiklat',
        'namadiklat',
        'tahun',
        'nipwi',
        'namawi',
        'materi',
        'hasil1', 'hasil2', 'hasil3', 'hasil4', 'hasil5', 'hasil6', 'hasil7',
        'hasil8', 'hasil9', 'hasil10', 'hasil11', 'hasil12', 'hasil13', 'hasil14',
        'saran',
        'nip_peserta',
        'nama_peserta',
        'timestamp',
    ];
}