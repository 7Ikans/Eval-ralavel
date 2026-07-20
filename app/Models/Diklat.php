<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    protected $table = 'diklat';
    public $timestamps = false;

    protected $fillable = [
        'status',
    ];
}
