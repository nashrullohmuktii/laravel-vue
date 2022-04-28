@extends('layouts.admin')
@section('header','Customer')

@section('css')
<!--Datatables-->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    
                    <div class="row">
                        <div class="col-md-11">
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Customer</a>
                        </div>
                        <div class="col-md-1">
                            <select class="form-control" name="gender">
                                <option value="0">All Gender</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    {{--<div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>--}}
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table id="datatable" class="table table-striped text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">E.mail</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off"  @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="name" name="name" class="form-control" :value="data.name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control" required="" :value="data.gender">
                                        <option :selected="data.gender" value="M">Male</option>
                                        <option :selected="data.gender" value="F">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Phone Number</label>
                                    <input type="string" name="phone_number" class="form-control" :value="data.phone_number" placeholder="Phone Number" required="">
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" name="address" class="form-control" :value="data.address" placeholder="Address" required="">
                                </div>
                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" name="email" class="form-control" :value="data.email" placeholder="Email" required="">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- DataTables  & Plugins -->
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
    var actionUrl = '{{url('customers')}}';
    var apiUrl = '{{url('api/customers')}}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'gender', class: 'text-center', orderable: true},
        {data: 'phone_number', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta) {
            return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{asset('js/data.js')}}"></script>
<!-- CRUD Vue Js -->
{{--<script type="text/javascript">
    var controller = new Vue({
        el:'#controller',
        data:{
            data: {},
            actionUrl : '{{url('customers')}}'
        },
        mounted: function () {
            
        },
        methods:{
            addData(){
                this.data = {};
                //console.log('add data');
                this.actionUrl='{{url('customers')}}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(data){
                this.data = data;
                this.actionUrl='{{url('customers')}}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id){
                this.actionUrl = '{{url('customers')}}'+'/'+id;
                if (confirm("Are you sure ?")){
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                        location.reload();
                    });
                }
            },
        }
    });
</script>--}}
<!-- Page specific script -->
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();
        
    });
</script>

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
