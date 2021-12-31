@extends('layouts.admin')

@section('title-web', 'Publisher')
@section('header', 'Edit Publisher')

@section('content')
    <div class="row">
          <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Publisher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('publishers/'.$publisher->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control"  value="{{ $publisher->name }}" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $publisher->email }}" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $publisher->phone_number }}" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" name="address" placeholder="Enter Address">{{ $publisher->address }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>      
    </div>   
@endsection