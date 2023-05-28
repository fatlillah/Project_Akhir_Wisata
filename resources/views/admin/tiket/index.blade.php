@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DATA Pemesanan</h3>
                    <a href="{{ route('tiket.create') }}" type="button" class="btn btn-success" style="float: right">Tambah Data Wisata</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Wisata</th>
                                <th>Tanggal</th>
                                <th>Harga Tiket</th>
                                <th>Jumlah Tiket</th>
                                <th>Harga Total</th>
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
                                <td>{{ $item->nama_pemesan }}</td>
                                <td>{{ $item->nama_wisata }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>@currency($item->harga_tiket)</td>
                                <td>{{ $item->jumlah_tiket }}</td>
                                <td>@currency($item->harga_total)</td>

                                <td>
                                    <form action="{{ route('tiket.destroy', $item->id) }}" method="post" style="display:inline">
                                        <a href="{{ route('tiket.edit', $item->id) }}" class="btn btn-sm btn-warning">EDIT</a>
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