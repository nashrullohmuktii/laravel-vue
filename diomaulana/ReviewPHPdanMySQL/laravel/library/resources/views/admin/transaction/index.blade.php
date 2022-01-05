@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection 

@section('title-web', 'Transaction')
@section('header', 'Transaction')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ url('transactions/create') }}" type="button" class="btn btn-primary">Create New Transaction</a>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="gender">
                                <option value="0">All Gender</option>
                                <option value="2">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                    <input type="date" name="date_start" id="date_start" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-10">
                <table id="datatable" class="table table-bordered table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-center">Date Start</th>
                        <th class="text-center">Date End</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Duration (Day)</th>
                        <th class="text-center">Book Total</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Status</th>
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
    
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';
    

    var columns = [
        {data: 'tgl_pinjam', class:'text-center', orderable: true},
        {data: 'tgl_kembali', class:'text-center', orderable: true},
        {data: 'name', class:'text-center', orderable: true},
        {data: 'duration', class:'text-center', orderable: false},
        {data: 'totalBuku', class:'text-center', orderable: false},
        {data: 'totalPrice', class:'text-center', orderable: false},
        {render: function(index, row, data, meta){
            return `
                <button class="btn btn-${data.badge} btn-sm" type="button">${data.status_book}</button>`;
        }, orderable: false, width:'200px', class:'text-center'},
        {render: function(index, row, data, meta){
            return `
                <a class="btn btn-warning btn-sm" type="button" href="{{ url('transactions/${data.transactionID}/edit') }}">Edit</a>
                <a class="btn btn-info btn-sm" type="button" href="{{ url('/transaction/details/${data.transactionID}') }}">Detail</a>
                <button class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.transactionID})">Delete</button>
                `;
        }, orderable: false, width:'200px', class:'text-center'},
    ];


    var controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        editStatus: false,
    },
    mounted: function(){
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            _this.table = $('#datatable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns
            }).on('xhr', function () {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        deleteData(event, id){
            if(confirm('Are you sure ?')){
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                   location.reload();
                });
            }
        }
    }
});
    $('select[name=gender]').on('change', function(){
        date = $('#date_start').val();
        gender = $('select[name=gender]').val();
        if(gender == 0 && date == null){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?gender='+gender+'&date='+date).load();
        }
    });
    $('#date_start').on('change', function(){
        date = $('#date_start').val();
        gender = $('select[name=gender]').val();
        if(gender == 0 && date == null){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?gender='+gender+'&date='+date).load();
        }
    });
</script>

@endsection 