<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    protected $table = 'ketersediaan';
    public $timestamps = false;

    protected $fillable = [
        'soal1', 'soal2', 'soal3', 'soal4',
        'catatan',
        'diklat',
    ];
}