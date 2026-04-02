<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoKodeKab extends Model
{
    //
    protected $table = 'no_kode_kab';
    protected $fillable = [
        'nama_kabupaten',
        'kode_kab',
    ];
}
