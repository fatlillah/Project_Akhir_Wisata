@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DATA WISATA</h3>
                    <a href="{{ route('wisata.create') }}" type="button" class="btn btn-success" style="float: right">Tambah Data Wisata</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ Storage::url('public/wisata/').$item->gambar }}" alt="{{ $item->nama }}" height="100"></td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>@currency($item->harga)</td>

                                <td>
                                    <form action="{{ route('wisata.destroy', $item->id) }}" method="post" style="display:inline">
                                        <a href="{{ route('wisata.edit', $item->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ? Data tidak dapat dipulihkan')">DELETE</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection