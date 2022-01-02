@extends('layouts.admin')

@section('header')
    Catalog
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Catalog</h3>

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
        <div class="card-body p-0">
          <table class="table table-bordered mr-2 ml-2">
            <thead>
              <tr class="text-center">
                <th style="width: 10px">No</th>
                <th>Name</th>
                <th>Total Books</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($catalogs as $key => $catalog)
              <tr>
                <td>{{ $key+1}} .</td>
                <td>{{ $catalog->name }}</td>
                <td class="text-center">{{ count($catalog->books) }}</td>
                <td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->created_at))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>
@endsection