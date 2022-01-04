@extends('layouts.admin')
@section('header')
    Publisher
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <a href="{{ url('publishers/create')}}" class="btn btn-sm btn-primary pull-right">Add New Publisher</a>    
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($publishers as $key => $publisher)                                                  
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $publisher->name }}</td>
            <td>{{ $publisher->email }}</td>
            <td>{{ $publisher->phone_number }}</td>
            <td>{{ $publisher->address }}</td>
            <td class="text-center">
              <div class="justify-content-center">                            
                  {{-- edit --}}
                <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                  <br>                
                  {{-- delete --}}
                <form action="{{ url('publishers', ['id' =>$publisher->id]) }}" method="post">
                  <input type="submit" class="btn btn-danger btn-sm" value="delete" onclick="return confirm('Are You Sure?')">
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
