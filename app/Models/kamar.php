<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $fillable = ['hotel_id', 'jenis_kamar', 'deskripsi', 'harga_permalam'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
