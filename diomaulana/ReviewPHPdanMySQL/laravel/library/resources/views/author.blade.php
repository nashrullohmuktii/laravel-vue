@extends('layouts.admin')

@section('css')

@endsection 
@section('header', 'Author')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <button  @click="addData()" class="btn btn-primary">
                  Create New Author
                </button>
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
                        <th>#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $key => $author)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td>
                                <button href="" @click="editData({{ $author }})" class="btn btn-warning">Edit</button>
                                <button href="" @click="deleteData({{ $author->id }})" class="btn btn-danger">Delete</button>
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
    <!-- modal -->
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
                        <input type="text" class="form-control" :value="data.name" name="name" required>
                </div>
                <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" :value="data.email" name="email" required>
                </div>
                <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" :value="data.phone_number" name="phone_number" required>
                </div>
                <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" :value="data.address" name="address" required>
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl : '{{ url('authors') }}',
                editStatus : false

            }, 
            mounted: function(){

            },
            methods: {
                addData(){
                    this.data = {};
                    this.actionUrl = '{{ url('authors') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data){
                    
                    this.data = data;
                    this.actionUrl = '{{ url('authors') }}'+'/'+ data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id){
                    this.actionUrl = '{{ url('authors') }}'+'/'+ id;
                    if(confirm('Are you sure ?')){
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        });
                    }
                }
            }
        });

    </script>
@endsection 