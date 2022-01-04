@extends('layouts.admin')

@section('header')
    Catalog
@endsection

@section('content')
<div>
  <a href="{{ url('catalogs') }}" class="btn btn-info btn-sm pull-right ml-2 mb-2" style="width: auto">Back</a>
</div>

<div class="card card-primary ml-2 mr-2">
  
 
  <!-- /.card-header -->
  <!-- form start -->
 
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Catalog</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('catalogs') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Create New Catalog</label>
              <input type="text" name="name" class="form-control" placeholder="Enter New Catalog" required="">
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