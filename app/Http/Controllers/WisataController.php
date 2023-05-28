<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wisata::all();
        $title = 'Master data';
        // dd($data);
        return view('admin.wisata.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  'Tambah Data';
        return view('admin.wisata.create', ['judul' => $title]);
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
            'gambar'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'      => 'required',
            'deskripsi' => 'required|min:10',
            'harga'     => 'required|numeric',
        ]);

        //upload gambar
        $image = $request->file('gambar');
        $image->storeAs('public/wisata', $image->hashName());

        //insert data
        Wisata::create([
            'gambar'    => $image->hashName(),
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('wisata.index')->with('toast_success', 'Data berhasil ditambahkan!');
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
        $data = Wisata::find($id);
        return view('admin.wisata.edit', compact('data'));
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
        $image->storeAs('public/wisata', $image->hashName());

        DB::table('wisatas')->where('id', $id)->update([
            'gambar'    => $image->hashName(),
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('wisata.index')->with('toast_success', 'Data berhasil diubah');
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
        return redirect()->route('wisata.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
