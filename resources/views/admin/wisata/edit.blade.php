@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('wisata.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                    @error('gambar')
                    <div class="alert alert-danger mt=2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama">
                    @error('nama')
                    <div class="alert alert-danger mt=2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3">{{$data->deskripsi }}</textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger mt=2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" value="{{ $data->harga }}" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga">
                    @error('harga')
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
</div>
@endsection