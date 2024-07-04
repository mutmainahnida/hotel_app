<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'nama', 'lokasi', 'penilaian', 'gambar', 'alamat','email'
    ];
}
