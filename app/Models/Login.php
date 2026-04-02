<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Login extends Authenticatable implements JWTSubject
{
    //
    use Notifiable;
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['role' => $this->role];
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
