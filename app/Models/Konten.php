<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    //
    protected $table ='konten';
    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'uploader',
        'tipe'
    ];

    public function gambar()
    {
        return $this->hasMany(Gambar::class, 'konten_id');
    }
}
