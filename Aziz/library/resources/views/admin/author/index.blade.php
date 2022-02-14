@extends('layouts.admin')
@section('header, Author')

@section('content')
<div class="card-header">
  <h3 class="card-title">Data Author</h3>
</div>

<div class="card-header">
  <a href ="{{url('authors/create')}}" class="btn btn-sm btn-primary pull right">Create New Author</a>
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
                      <th class=text-center>E.mail</th>
                      <th class=text-center>Address</th>
                      <th class=text-center>Phone Number</th>
                      <th class=text-center>Created at</th>
                      <th class=text-center>Updated at</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($authors as $author)
                    <tr>
                      <td>{{ $author->id }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->email }}</td>
                      <td>{{ $author->address }}</td>
                      <td>{{ $author->phone_number }}</td>
                      <td class=text-center>{{date("H:i:s-d.m.Y", strtotime($author->created_at))}}</td>
                      <td class=text-center>{{date("H:i:s-d.m.Y", strtotime($author->updated_at))}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
</div>
@endsection
