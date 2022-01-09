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
          <h3 class="card-title">Create New Publisher</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('publishers') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Enter Email" required="">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
  
@endsection