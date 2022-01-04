@extends('layouts.admin')

@section('header')
    Publisher
@endsection

@section('content')

<div>
  <a href="{{ url('publishers') }}" class="btn btn-info btn-sm pull-right ml-2 mb-2" style="width: auto">Back</a>
</div>

<div class="card card-primary ml-2 mr-2">
 
  <!-- /.card-header -->
  <!-- form start -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Publisher</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('publishers/'.$publisher->id) }}" method="post">
          @csrf
          {{ method_field('PUT') }}

          <div class="card-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Edit Name" required="" value="{{ $publisher->name }}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Edit Email" required="" value="{{ $publisher->email }}">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Edit Phone Number" required="" value="{{ $publisher->phone_number }}">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Edit Address" required="" value="{{ $publisher->address }}">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
</div>
  
@endsection