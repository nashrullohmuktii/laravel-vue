@extends('layouts.admin')
@section('header, Member')

@section('css')
<!--Datatables-->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div id="controller">
    <div class="card-header">
        <h3 class="card-title">Data Member</h3>
    </div>

    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <a href ="#" @click="addData()" class="btn btn-sm btn-primary pull right">Create New Member</a>
            </div>
            <div class="col-md-2 float-right">
                <select class="form-control" name="gender">
                    <option value="0">All Gender</option>
                    <option value="F">Female</option>
                    <option value="M">Male</option>
                </select>
            </div>
        </div>
            {{--<div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150phppx;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>--}}
            
        
    </div>

    <div class="card-body table-responsive p-0">
        <table id ="datatable" class="table table-hover text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class=text-center>No.</th>
                    <th class=text-center>Name</th>
                    <th class=text-center>Gender</th>
                    <th class=text-center>Phone Number</th>
                    <th class=text-center>Address</th>
                    <th class=text-center>E.mail</th>
                    <th class=text-center>Created at</th>
                    <th class=text-center>Updated at</th>
                    <th class=text-center>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                    
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
                            <input type="text" name="name" class="form-control" placeholder=" Enter Name" required="" :value="data.name"  maxlength="26">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required="" :value="data.gender">
                                <option :selected="data.gender" value="M">Male</option>
                                <option :selected="data.gender" value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" placeholder=" Enter Phone Number" required="" :value="data.phone_number">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder=" Enter Address" required="" :value="data.address">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder=" Enter Email" required="" :value="data.email">
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
<!--DataTables & Plugins-->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
    var actionUrl = '{{url('members')}}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'gender', class: 'text-center', orderable: false},
        {data: 'phone_number', class: 'text-center', orderable: false},
        {data: 'address', class: 'text-center', orderable: false},
        {data: 'email', class: 'text-center', orderable: false},
        {data: 'created_at', class: 'text-center', orderable: false},
        {data: 'updated_at', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta){
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable:false, width:'200px', class: 'text-center'},
    ];
</script>

<script src="{{asset('js/data.js')}}"></script>
<script type="text/javascript">
    $('select[name=gender]').on('change', function(){
        gender = $('select[name=gender]').val();

        if (gender == 0){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?gender='+gender).load();
        }
    });
</script>
@endsection