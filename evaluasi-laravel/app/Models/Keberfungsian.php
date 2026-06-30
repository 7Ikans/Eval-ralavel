<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keberfungsian extends Model
{
    protected $table = 'keberfungsian';
    public $timestamps = false;

    protected $fillable = [
        'soal1', 'soal2', 'soal3', 'soal4', 'soal5', 'soal6', 'soal7',
        'catatan',
        'diklat',
    ];
}