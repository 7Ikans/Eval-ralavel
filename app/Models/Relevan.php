<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relevan extends Model
{
    protected $table = 'relevan';
    public $timestamps = false;

    protected $fillable = [
        'soal1', 'soal2', 'soal3',
        'catatan',
        'diklat',
    ];
}