@extends('layouts.admin')
@section('header','Customer')

@section('css')
<!--Datatables-->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <a href="{{url('customers/create')}}" class="btn btn-sm btn-primary pull-right">Create New Customer</a>
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
                                <th class="text-center">No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">E.mail</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $key => $customer)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $customer->name }}</td>
                                <td class="text-center">{{ $customer->gender }}</td>
                                <td class="text-center">{{ $customer->phone_number }}</td>
                                <td class="text-center">{{ $customer->address }}</td>
                                <td class="text-center">{{ $customer->email }}</td>
                                <td class="text-center">
                                    <a href="{{url('customers/'.$customer->id.'/edit')}}" class="btn btn-warning bt-sm">Edit</a>
                                    <form action="{{url('customers',['id'=>$customer->id])}}" method="POST">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you Sure')">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{--@section('js')
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
    var actionUrl = '{{url('customers')}}';
    var apiUrl = '{{ url('api/customers') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'gender', class: 'text-center', orderable: false},
        {data: 'phone_number', class: 'text-center', orderable: false},
        {data: 'address', class: 'text-center', orderable: false},
        {data: 'email', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta){
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable:false, width:'200px', class: 'text-center'},
    ];

    var controller = new Vue ({
        el: '#controller',
        data: {
            datas: [],
            data:{},
            actionUrl,
            apiUrl,
            editStatus:false,
        },
        mounted: function(){
            this.datatable();
        },
        methods:{
            datatable(){
                const _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET',
                    },
                    columns
                }).on('xhr', function(){
                    _this.datas = _this.table.ajax.json().data;
                });
            },
            addData(){
                this.data = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(event, row){
                this.data = this.datas[row];
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(event,id){
                if (confirm("Are you sure ?")) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => alert('Data has been removed'));
                }
            },
            submitForm(event,id){
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
            },
        }
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
@endsection--}}