@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('tiket.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                            name="nama_pemesan" id="nama_pemesan" value="{{ $data->nama_pemesan }}">
                        @error('nama_pemesan')
                            <div class="alert alert-danger mt=2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_wisata" class="form-label">Nama Wisata</label>
                        <select name="nama_wisata" id="nama_wisata">
                            <option value="{{ $data->nama_wisata }}">{{ $data->nama_wisata }}</option>
                            @foreach ($data1 as $p)
                                <option value="{{ $p->nama }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @error('nama_wisata')
                            <div class="alert alert-danger mt=2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                            id="tanggal" value="{{ $data->tanggal }}">
                        @error('tanggal')
                            <div class="alert alert-danger mt=2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_tiket" class="form-label">Harga Tiket</label>
                        <select name="harga_tiket" id="harga_tiket">
                            <option value="{{ $data->harga_tiket }}">{{ $data->harga_tiket }}</option>
                            @foreach ($data1 as $p)
                                <option value="{{ $p->harga }}">{{ $p->harga }}</option>
                            @endforeach
                        </select>
                        @error('harga_tiket')
                            <div class="alert alert-danger mt=2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                        <input type="number" class="form-control @error('jumlah_tiket') is-invalid @enderror"
                            name="jumlah_tiket" id="jumlah_tiket" value="{{ $data->jumlah_tiket }}">
                        @error('jumlah_tiket')
                            <div class="alert alert-danger mt=2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection
