@extends('layouts.admin')
@section('header')
    Transaction
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add New Transaction</a> 
        </div>
        
        <!-- /.card-header -->
        <div class="card-body pl-3 mt-2 mb-2">
            <table id="datatable" class="table table-bordered table-striped mr-2">
            <thead>
              <tr class="text-center">
                <th style="width: 10px">No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Peminjam</th>
                <th>Lama Peminjaman (Hari)</th>
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
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
            <div class="modal-header">
              <h4 class="modal-title">Transaction</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <div class="modal-body">
  
              @csrf          
              
              <input type="hidden" name="_method" value="PUT" v-if="editStatus">
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Anggota</label>
                  </div>
                  <div class="col-md-9">
                    <select name="member_id" class="form-control">
                      @foreach ($members as $member)
                      <option :selected="data.member_id == {{ $member->id }}" value="{{ $member->id }}">{{ $member->name }}</option>    
                      @endforeach                            
                  </select>
                  </div>
                </div>                
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal</label>
                  </div>
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="input-group date" id="date_start" data-target-input="nearest">
                          <input type="text" name="date_start" class="form-control datetimepicker-input" data-target="#date_start"/>
                          <div class="input-group-append" data-target="#date_start" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>                              
                          </div>
                        </div>
                      </div>
                      <h2 class="col-md-2 text-center">-</h2>
                      <div class="col-md-5">
                        <div class="input-group date" id="date_end" data-target-input="nearest">
                          <input type="text" name="date_end" class="form-control datetimepicker-input" data-target="#date_end"/>
                          <div class="input-group-append" data-target="#date_end" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                                                 
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Buku</label>
                  </div>
                  <div class="col-md-9">
                    <div class="select2-purple">
                      <select class="select2" multiple="multiple" name="book_id" data-placeholder="Select a Book" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @foreach ($books as $book)
                        <option :selected="data.book_id == {{ $book->id }}" value="{{ $book->id }}">{{ $book->title }}</option>                          
                        @endforeach
                        @foreach ($transaction_details as $transaction_detail)
                        <option :selected="data.id == {{ $transaction_detail->transaction_id }}" value="[{{ $transaction_detail->book_id }}]" v-if="editStatus">{{ $transaction_detail->book_id }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>                
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Status</label>
                  </div>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="sudahDikembalikan" name="status">
                      <label for="sudahDikembalikan" class="custom-control-label">Sudah Dikembalikan</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="belumDikembalikan" name="status" checked>
                      <label for="belumDikembalikan" class="custom-control-label">Belum Dikembalikan</label>
                    </div>      
                  </div>
                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Enter</button>
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
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>

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
          <a href=""{{ url('catalogs/'+ ${data.id} + '/edit') }}"" class="btn btn-warning btn-sm">
            Edit
          </a>
          <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
            Delete
          </a>`;
      }, orderable: false, width:'200px', class:'text-center'},
    ];
  </script>
  <!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date picker
    $('#date_start').datetimepicker({
        format: 'L'
    });
    $('#date_end').datetimepicker({
        format: 'L'
    });

  })
</script>
  <script src="{{asset('js/data.js')}}"></script>
@endsection