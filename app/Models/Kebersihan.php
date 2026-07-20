<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebersihan extends Model
{
    protected $table = 'kebersihan';
    public $timestamps = false;

    protected $fillable = [
        'kelas',
        'asrama',
        'soal1', 'soal2', 'soal3', 'soal4', 'soal5', 'soal6', 'soal7', 'soal8', 'soal9',
        'catatan',
        'diklat',
    ];
}