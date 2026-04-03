<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoKodeProv extends Model
{
    //
    protected $table = 'no_kode_prov';
    protected $fillable = [
         'nama_provinsi',
        'kode_prov',
    ];
       
    
}
