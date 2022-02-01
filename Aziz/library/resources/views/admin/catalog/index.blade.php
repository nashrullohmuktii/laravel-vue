@extends('layouts.admin')
@section('header, Catalog')

@section('content')
<div class="card-header">
                <h3 class="card-title">Data Catalog</h3>

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
<div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class=text-center>Id</th>
                      <th class=text-center>Name</th>
                      <th class=text-center>Total Books</th>
                      <th class=text-center>Created at</th>
                      <th class=text-center>Updated at</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogs as $catalog)
                    <tr>
                      <td>{{ $catalog->id }}</td>
                      <td>{{ $catalog->name }}</td>
                      <td class=text-center>{{count ($catalog->books)}}</td>
                      <td class=text-center>{{date("H:i:s-d.m.Y", strtotime($catalog->created_at))}}</td>
                      <td class=text-center>{{date("H:i:s-d.m.Y", strtotime($catalog->updated_at))}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
@endsection
