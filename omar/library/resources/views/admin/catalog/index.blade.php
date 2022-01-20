@extends('layouts.admin')

@section('header')
    Catalog
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <a href="{{ url('catalogs/create')}}" class="btn btn-sm btn-primary pull-right">Add New Catalog</a>

          {{-- <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 mt-2 mb-2 mr-3">
          <table class="table table-bordered mr-2 ml-2">
            <thead>
              <tr class="text-center">
                <th style="width: 10px">No</th>
                <th>Catalog</th>
                <th>Total Books</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($catalogs as $key => $catalog)
              <tr>
                <td>{{ $key+1}} .</td>
                <td>{{ $catalog->name }}</td>
                <td class="text-center">{{ count($catalog->books) }}</td>
                <td class="text-center">{{ convert_date($catalog->created_at)}}</td>
                <td class="text-center">
                  <div class="justify-content-center">
                     {{-- edit --}}
                    <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                    <br>
                    {{-- delete --}}
                    <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are You Sure?')">
                    @method('delete')
                    @csrf
                  </form>
                  </div>                 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>
@endsection