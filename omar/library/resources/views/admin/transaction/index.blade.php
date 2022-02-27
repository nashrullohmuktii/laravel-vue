@extends('layouts.admin')
@section('header')
    Transaction
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  
  
@endsection

@section('content')
<div id="controller">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('transactions/create') }}"  class="btn btn-sm btn-primary pull-right">Add New Transaction</a> 
        </div>
        
        <!-- /.card-header -->
        <div class="card-body pl-3 mt-2 mb-2">
            <div class="row mb-2">                
                <div class="col-md-4 ml-auto">
                    <div class="input-group">
                        <input type="date" class="form-control" name="date_start">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="sudah">Sudah Dikembalikan</option>
                        <option value="belum">Belum Dikembalikan</option>
                    </select>
                </div>               
            </div>
            <table id="datatable" class="table table-bordered table-striped mr-2">
            <thead>
              <tr class="text-center">
                <th style="width: 10px">No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Peminjam</th>
                <th>Lama Peminjaman</th>
                <th>Total Buku</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Action</th>              
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
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
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 

    <script type="text/javascript">
        var actionUrl = '{{ url('transactions') }}';
        var apiUrl = '{{ url('api/transactions') }}';
    
        var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'date_start', class: 'text-center', orderable: true},
        {data: 'date_end', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'long', class: 'text-center', orderable: false},
        {data: 'total_book', class: 'text-center', orderable: false},
        {data: 'total_price', class: 'text-center', orderable: false},
        {data: 'status2', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta) {
            return `
            <a href="{{ url('transactions/'.'${data.id}') }}" class="btn btn-info btn-sm" value="show">
            Detail
            </a>

            <a href="{{ url('transactions/'.'${data.id}'.'/edit') }}" class="btn btn-warning btn-sm">
                Edit
            </a>
            
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                Delete
            </a>`;
        }, orderable: false, width:'200px', class:'text-center'},
        ];
    </script>


<script src="{{asset('js/data.js')}}"></script>


    <script type="text/javascript">
        $('select[name=status]').on('change', function(){
            status = $('select[name=status]').val();

            if (status == ""){
                controller.table.ajax.url(apiUrl).load();
            } else {
                controller.table.ajax.url(apiUrl+'?status='+status).load();
            }
        })

        $('input[name=date_start]').on('change', function(){
            date_start = $('input[name=date_start]').val();

            if (date_start == ""){
                controller.table.ajax.url(apiUrl).load();
            } else {
                controller.table.ajax.url(apiUrl+'?date_start='+date_start).load();
            }
        })
    </script>
@endsection