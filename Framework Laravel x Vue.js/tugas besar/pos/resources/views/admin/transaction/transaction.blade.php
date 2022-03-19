@extends('layouts.main')
@section('header', 'Data Transaction')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css?v=3.2.0')}}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('pos') }}" class="btn btn-sm btn-primary pull-right">Goto Kasir Page</a>
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Customer Name</th>
                                    <th>Payment</th>
                                    <th>Total Product</th>
                                    <th>Total Price</th>
                                    <th>Purchasing Date</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'payment', class: 'text-center', orderable: false},
        {data: 'total_product', class: 'text-center', orderable: false},
        {data: 'total_price', class: 'text-center', orderable: false},
        {data: 'created', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta) {
            return `
                <a href="{{ url('transactions/'.'${data.id}') }}" type="button" class="btn btn-primary btn-sm">
                    Detail
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                    Delete 
                </a>` ;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('.select2').select2()
    });
</script>

<script src="{{ url('js/data.js') }}">{{}}</script>
@endsection