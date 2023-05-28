@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Admin</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Role</label>
                            <select name="roles" class="form-control">
                                @foreach ($roles as $p)
                                <option value="{{ $p->name }}">{{ $p->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="float: right">
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>&ensp;
                    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection