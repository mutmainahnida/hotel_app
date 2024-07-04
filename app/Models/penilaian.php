<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'penilaian',
        'teks_penilaian',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
