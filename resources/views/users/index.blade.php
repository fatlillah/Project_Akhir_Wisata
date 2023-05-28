@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Admin</h3>
                    <a href="{{ route('users.create') }}" type="button" class="btn btn-success" style="float: right">Tambah Data
                        Admin</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                                        <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ? Data tidak dapat dipulihkan')">Delete</button>
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