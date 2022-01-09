@extends('layouts.admin')
@section('header')
    Author
@endsection


@section('css')
    
@endsection


@section('content')
<div id="controller">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add New Author</a> 
      </div>
      
  
      {{-- <div class="card-header">
        <a href="{{ url('authors/create')}}" class="btn btn-sm btn-primary pull-right">Add New Author</a>    
        <div class="card-tools">
          <ul class="pagination pagination-sm float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"
            ><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
      </div> --}}
      <!-- /.card-header -->
      <div class="card-body p-0 mt-2 mb-2 mr-3">
          <table class="table table-bordered mr-2 ml-2">
          <thead>
            <tr class="text-center">
              <th style="width: 10px">No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($authors as $key => $author)                                                
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $author->name }}</td>
              <td>{{ $author->email }}</td>
              <td>{{ $author->phone_number }}</td>
              <td>{{ $author->address }}</td>
              <td class="text-center">
                <div class="justify-content-center">                            
                    {{-- edit --}}            
                  <a href="#" @click="editData({{ $author }})" class="btn btn-warning btn-sm mb-1">Edit</a>
                    <br>                
                    {{-- delete --}}
                  <a href="#" @click="deleteData({{ $author->id }})" class="btn btn-danger btn-sm">Delete</a>

                  {{-- <form action="{{ url('authors', ['id' =>$author->id]) }}" method="post">
                    <input type="submit" class="btn btn-danger btn-sm" value="delete" onclick="return confirm('Are You Sure?')">
                    @method('delete') --}}
                    @csrf                            
                  </form>
                </div>
              </td>                        
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" :action="actionUrl" autocomplete="off" >
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
              <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required="">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" :value="data.phone_number" required="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required="">
            </div>          
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enter</button>
          </div>
        </form>        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>


@endsection

@section('js')
    <script type="text/javascript">
      var controller = new Vue ({
          el: '#controller',
          data: {
            data: {},
            actionUrl: '{{ url('authors') }}',
            editStatus: false,
          },
          mounted: function() {
            
          },
          methods: {
            addData() {
              this.data = {};
              this.actionUrl = '{{ url('authors') }}';
              this.editStatus = false;
              $('#modal-default').modal();
            },
            editData(data) {
              this.data = data;
              this.actionUrl = '{{ url('authors') }}' + '/' + data.id;
              this.editStatus = true;
              $('#modal-default').modal();
            },
            deleteData(id) {              
              this.actionUrl = '{{ url('authors') }}' + '/' + id;
              if (confirm("Are You Sure?")) {
                axios.post(this.actionUrl, {_method: 'DELETE'}).then(response=>{
                  location.reload();
                });
              }
            }
          }
      });
    </script>
@endsection
