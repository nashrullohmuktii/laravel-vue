@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull-right">Buat Publisher Baru</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Address</th>
                <th class="text-center">Email</th>
                <th class="text-center">Books</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($publishers as $key => $publisher)
              <tr>
                <td>{{ $key+1  }}</td>
                <td class="text-center">{{ $publisher->name }}</td>
                <td class="text-center">{{ $publisher->phone_number }}</td>
                <td class="text-center">{{ $publisher->address }}</td>
                <td class="text-center">{{ $publisher->email }}</td>
                <td class="text-center">{{ count($publisher->books) }}</td>
                <td class="text-center"><a href="{{ ('publishers/'.$publisher->id.('/edit')) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger d-inline align-baseline" onclick="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
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
  <!-- /.row -->
@endsection