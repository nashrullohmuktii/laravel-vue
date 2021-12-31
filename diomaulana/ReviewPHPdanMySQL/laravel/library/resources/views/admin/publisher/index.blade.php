@extends('layouts.admin')

@section('title-web', 'Publisher')
@section('header', 'Publisher')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <a href="{{ url('publishers/create') }}" class="btn btn-primary">Create New Publisher</a>

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
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($publishers as $key => $publisher)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>{{ $publisher->phone_number }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>
                                <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                <form action="{{ url('publishers',['id' => $publisher->id]) }}" method="post">
                                    <input class="btn btn-danger" value="Delete" type="submit" onclick="return confirm('Are you sure ?')">
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
@endsection