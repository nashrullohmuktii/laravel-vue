@extends('layouts.admin')


@section('header', 'Author')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Authors</h5>
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Books</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $key => $author)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td  class="text-center">
                                
                                    @if( count($author->books) == 0)
                                    <p class="text-danger">Currently Have No Book</p>
                                    @else
                                    @foreach($author->books as $key => $book)
                                        
                                            {{ $key+1 }} . {{$book->title}} <br>
                                        
                                    @endforeach
                                    @endif
                                
                            </td>
                            <td>{{ date("d M Y, H:i:s", strtotime($author->created_at)) }}</td>
                            <td>{{ date("d M Y, H:i:s", strtotime($author->updated_at)) }}</td>
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