<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class PesanTiketWisataController extends Controller
{
    public function pesanTiket($id)
    {
        $wisata = Wisata::findOrFail($id);

        return view('pesan-wisata.index', compact('wisata'));

        // <p> {{ $wisata->nama }) </
    }
}
