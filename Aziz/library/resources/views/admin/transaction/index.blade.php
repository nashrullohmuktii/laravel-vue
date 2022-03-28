@extends('layouts.admin')
@section('header, Transaction')

@section('content')
@section('css')
<!--Datatables-->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="card-header">
        <h3 class="card-title">Data Transaction</h3>
    </div>

    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <a href ="{{url('transactions/create')}}" @click="addData()" class="btn btn-sm btn-primary pull right">Create New Transaction</a>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="date_start">
                    <option value="">Transaction Date</option>
                        @foreach ($transactions as $transaction)
                    <option value="{{ $transaction->date_start }}">{{ date_2($transaction->date_start) }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="status">
                    <option value="">All Status</option>
                    <option value="0">Has Been Returned</option>
                    <option value="1">Not Been Restored</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table id ="datatable" class="table table-hover text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class=text-center>No.</th>
                    <th class=text-center>Date Start</th>
                    <th class=text-center>Date End</th>
                    <th class=text-center>Name</th>
                    <th class=text-center>Total Day</th>
                    <th class=text-center>Total Book</th>
                    <th class=text-center>Total Price</th>
                    <th class=text-center>Status</th>
                    <th class=text-center>Action</th>
                </tr>
            </thead>
        </table>
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
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'date_start', class: 'text-center', orderable: false},
        {data: 'date_end', class: 'text-center', orderable: false},
        {data: 'name2', class: 'text-center', orderable: false},
        {data: 'total_day', class: 'text-center', orderable: false},
        {data: 'total_book', class: 'text-center', orderable: false},
        {data: 'total_price', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta){
        return `
            <a href="{{ url('transactions/'.'${data.id}') }}" class="btn btn-info btn-sm" value="show">Ditail</a>
            <a href="{{ url('transactions/'.'${data.id}'.'/edit') }}" class="btn btn-warning btn-sm" >Edit</a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable:false, width:'200px', class: 'text-center'},
    ];
</script>

<script src="{{asset('js/data.js')}}"></script>
<script type="text/javascript">

    $('select[name=status]').on('change', function(){
        status = $('select[name=status]').val();

        if (status ==""){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?status='+status).load();
        }
    });
    
    $('select[name=date_start]').on('change', function(){
        date_start = $('select[name=date_start]').val();

        if (date_start ==""){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?date_start='+date_start).load();
        }
    });
</script>
@endsection
