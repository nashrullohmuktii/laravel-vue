@extends('layouts.admin')
@section('header, Author')

@section('css')

@endsection
@section('content')
<div id="controller">
  <div class="card-header">
    <h3 class="card-title">Data Author</h3>
  </div>

  <div class="card-header">
    <a href ="#" @click="addData()" class="btn btn-sm btn-primary pull right">Create New Author</a>
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
                        <th class=text-center>Action</th>
                        
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
                        <td class=text-right>
                            <a href="#" @click="editData({{$author}})" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" @click="deleteData({{$author->id}})" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
  </div>

  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
          <div class="modal-content">
              <form method="post" :action="actionUrl" autocomplete="off">
                
                <div class="modal-header">
                      <h4 class="modal-title">Author</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                      @csrf

                      <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder=" Enter Name" required="" :value="data.name"  maxlength="26">
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder=" Enter Email" required="" :value="data.email">
                      </div>
                      <div class="form-group">
                          <label>Phone Number</label>
                          <input type="number" name="phone_number" class="form-control" placeholder=" Enter Phone Number" required="" :value="data.phone_number">
                      </div>
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address" class="form-control" placeholder=" Enter Address" required="" :value="data.address">
                      </div>
                  
                </div>
            <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data : {
        data : {},
        actionUrl :'{{ url('authors') }}',
        editStatus : false,
      },
      mounted: function(){

      },
      methods:{
        addData(){
          this.data = {};
          this.actionUrl = '{{url('authors')}}';
          this.editStatus = false;
          $('#modal-default').modal();

        },
        editData(data){
          this.data = data;
          this.actionUrl = '{{url ('authors') }}'+'/'+data.id;
          this.editStatus = true;
          $('#modal-default').modal();

        },
        deleteData(id){
          this.actionUrl = '{{ url('authors') }}'+'/'+id;
          if (confirm("Are you sure ?")) {
              axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {location.reload(); });
          }

        }

      }
    });
  </script>

@endsection