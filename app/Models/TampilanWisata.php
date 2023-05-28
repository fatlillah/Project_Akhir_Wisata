<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TampilanWisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar',
        'nama',
        'deskripsi',
        'harga'
    ];
}
