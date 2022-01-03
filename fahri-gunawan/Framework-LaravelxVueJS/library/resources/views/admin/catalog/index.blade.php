@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Catalog Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>Create At</th>
                <th>Update At</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Autumn Altenwerth</td>
                <td>2021-12-28 15:20:15</td>
                <td>2021-12-28 15:20:15</td>
              </tr>
              <tr>
                <td>Ara Hoeger</td>
                <td>2021-12-28 15:20:15</td>
                <td>2021-12-28 15:20:15</td>
              </tr>
              <tr>
                <td>Kayley Renner</td>
                <td>2021-12-28 15:20:15</td>
                <td>2021-12-28 15:20:15</td>
              </tr>
              <tr>
                <td>Aurelie VonRueden</td>
                <td>2021-12-28 15:20:15</td>
                <td>2021-12-28 15:20:15</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
@endsection