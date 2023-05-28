<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tiket::all();
        $title = 'Master data';
        // dd($data);
        return view('admin.tiket.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Wisata::all();
        $title =  'Tambah Data';
        return view('admin.tiket.create', compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validate($request, [
            'nama_pemesan'      => 'required',
            'nama_wisata' => 'required',
            'tanggal' => 'required',
            'harga_tiket' => 'required|numeric',
            'jumlah_tiket' => 'required|numeric',
        ]);
        $harga = $request->harga_tiket;
        $total = $harga * $request->jumlah_tiket;
        // var_dump($total);die;
        //insert data
        Tiket::create([
            'nama_pemesan'      => $request->nama_pemesan,
            'nama_wisata' => $request->nama_wisata,
            'tanggal'     => $request->tanggal,
            'harga_tiket'     => $request->harga_tiket,
            'jumlah_tiket'     => $request->jumlah_tiket,
            'harga_total'     => $harga * $request->jumlah_tiket,
        ]);

        return redirect()->route('tiket.index')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tiket::find($id);
        return view('admin.tiket.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'      => 'required',
            'deskripsi' => 'required|min:10',
            'harga'     => 'required|numeric',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/tiket', $image->hashName());

        DB::table('wisatas')->where('id', $id)->update([
            'gambar'    => $image->hashName(),
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('tiket.index')->with('toast_success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('wisatas')->where('id', $id)->delete();
        return redirect()->route('tiket.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
