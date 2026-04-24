<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    //
    protected $table = 'gambar';
    protected $fillable = 
    [
        'path',
        'konten_id',
    ];

    public function konten()
    {
        return $this->belongsTo(Konten::class, 'konten_id');
    }

}
