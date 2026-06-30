<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $table = 'pelayanan';
    public $timestamps = false;

    protected $fillable = [
        'soal1', 'soal2', 'soal3', 'soal4',
        'catatan',
        'nama_diklat',
    ];
}