@extends('layouts.admin')
@section('header', 'Customer')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Customer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{url('customers')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="name" name="name" class="form-control"  placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="name" name="gender" class="form-control" placeholder="F or M" required="">
                    </div>
                    <div class="form-group">
                        <label >Phone Number</label>
                        <input type="string" name="phone_number" class="form-control"  placeholder="Phone Number" required="">
                    </div>
                    <div class="form-group">
                        <label >Address</label>
                        <input type="text" name="address" class="form-control"  placeholder="Address" required="">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="email" class="form-control"  placeholder="Email" required="">
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
