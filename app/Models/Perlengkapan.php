<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    protected $table = 'perlengkapan';
    public $timestamps = false;

    protected $fillable = [
        'soal1', 'soal2', 'soal3', 'soal4', 'soal5',
        'catatan',
        'diklat',
    ];
}