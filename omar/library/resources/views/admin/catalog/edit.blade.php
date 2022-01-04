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
          <h3 class="card-title">Edit Catalog</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('catalogs/'.$catalog->id) }}" method="post">
          @csrf
          {{ method_field('PUT') }}

          <div class="card-body">
            <div class="form-group">
              <label>Catalog</label>
              <input type="text" name="name" class="form-control" placeholder="Edit Catalog" required="" value="{{ $catalog->name }}">
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