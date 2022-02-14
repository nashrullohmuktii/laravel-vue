@extends('layouts.admin')
@section('header, Publisher')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
           <h3 class="card-title">New Publisher</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('publishers')  }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder=" Enter Name" required="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" email="email" class="form-control" placeholder=" Enter Email" required="">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="number" phone_number="phone_number" class="form-control" placeholder=" Enter Phone Number" required="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" address="address" class="form-control" placeholder=" Enter Address" required="">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection