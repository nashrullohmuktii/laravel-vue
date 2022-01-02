@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection 

@section('title-web', 'Member')
@section('header', 'Member')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <button @click="addData()" class="btn btn-primary">Create New Member</button>

                
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-10">
                <table id="datatable" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Action</th>

                    </tr>
                    </thead>
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
            <form method="post" :action="actionUrl" autocomplete="off" @submit="submitform($event, data.id)">
                <div class="modal-header">
                <h4 class="modal-title">Member</h4>
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
                            <label>Gender</label>
                            <select class="form-control" name='gender'>
                                <option :selected="data.gender == 0" value="0">Perempuan</option>
                                <option :selected="data.gender == 1" value="1">Laki -Laki</option>
                            </select>
                    </div>
                    <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" :value="data.phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" :value="data.address" name="address" required>
                    </div>
                    <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" :value="data.email" name="email" required>
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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    var actionUrl = '{{ url('members') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
        {data: 'DT_RowIndex', class:'text-center', orderable: true},
        {data: 'name', class:'text-center', orderable: false},
        {data: 'gender', class:'text-center', orderable: false},
        {data: 'phone_number', class:'text-center', orderable: false},
        {data: 'address', class:'text-center', orderable: false},
        {data: 'email', class:'text-center', orderable: false},
        {render: function(index, row, data, meta){
            return `
                <button class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</button>`;
        }, orderable: false, width:'200px', class:'text-center'},
    ];


</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection 