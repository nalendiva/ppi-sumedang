<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Login;


class Anggota extends Model
{
    //
    protected $table = 'anggota';
    protected $fillable = [
        'no_urut',
        'nama',
        'asal_sekolah',
        'alamat',
        'email',
        'no_telp',
        'provinsi',
        'kabupaten',
        'angkatan',
        'nrm',
        'pendidikan',
        'pekerjaan',
    ];

    public function login(){
        return $this->hasOne(Login::class);
    }
}
