@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Buat Publisher</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('publishers') }}" method="POST">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="namaPublisher">Nama Publisher</label>
                    <input type="text" name="name" class="form-control" id="namaPublisher" placeholder="Masukkan Nama Publisher" required>
                    <label for="nomorTelepon">Nomor Telepon</label>
                    <input type="tel" name="phone_number" class="form-control" id="nomorTelepon" placeholder="Masukkan Nomor Telepon" required>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="address" class="form-control" id="alamat" placeholder="Masukkan Alamat" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
@endsection