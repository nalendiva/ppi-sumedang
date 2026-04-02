<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;

class Login extends Model
{
    //
    protected $table = 'login';
    protected $fillable = 
    [
        'username',
        'password',
        'role',
        'anggota_id',
    ];
    
    protected $hidden = [
        'password',
    ];

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
