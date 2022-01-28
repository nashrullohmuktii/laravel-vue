@extends('layouts.admin')
@section('header', 'Publisher')
@section('css')
@section('content')
<div id="controller">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="#" class="btn btn-sm btn-primary pull-right" @click="addData()">Buat Publisher Baru</a>

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
                <th>No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Address</th>
                <th class="text-center">Email</th>
                <th class="text-center">Books</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($publishers as $key => $publisher)
              <tr>
                <td>{{ $key+1  }}</td>
                <td class="text-center">{{ $publisher->name }}</td>
                <td class="text-center">{{ $publisher->phone_number }}</td>
                <td class="text-center">{{ $publisher->address }}</td>
                <td class="text-center">{{ $publisher->email }}</td>
                <td class="text-center">{{ count($publisher->books) }}</td>
                <td class="text-center">
                  <a href="#" class="btn btn-warning" @click="editData({{ $publisher }})">Edit</a>
                  <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form :action="actionUrl" method="post" autocomplete="off">
        <div class="modal-header">
          <h4 class="modal-title">Publisher</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
          <input type="hidden" name="_method" value="PUT" v-if="editStatus">

          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" :value="data.name">
          </div>
          <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" :value="data.phone_number">
          </div>
          <div class="form-group">
            <label for="">Adress</label>
            <input type="text" class="form-control" name="address" :value="data.address">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" :value="data.email">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
@endsection

@section('js')
<script>
  var controller = new Vue({
    el: '#controller',
      data:{
        data:{},
        actionUrl:'{{ url('publishers') }}',
        // editStatus: false
      },
      mounted: function() {
        
      },
      methods: {
        addData(){
          this.data = {};
          this.editStatus = false;
          this.actionUrl = '{{ url('publishers') }}';
         $('#modal-default').modal();
        },
        editData(data){
          this.data = data;
          this.editStatus = true;
          this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
          $('#modal-default').modal();
        },
        deleteData(id){
          this.actionUrl = '{{ url('publishers') }}'+'/'+id;
          if (confirm("Are you sure?")) {
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
            });
          }
        }
      }
  });
</script>
@endsection