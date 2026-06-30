<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsumsi extends Model
{
    protected $table = 'konsumsi';
    public $timestamps = false;

    protected $fillable = [
        'ruang',
        'soal1', 'soal2', 'soal3', 'soal4', 'soal5',
        'catatan',
        'diklat',
    ];
}