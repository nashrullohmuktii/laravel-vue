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
  <div class="row justify-content-center">
    <div class="col col-md-6">     
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Transaction Detail</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        

          <div class="card-body">
            <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Anggota</label>
                  </div>
                  <div class="col-md-9">
                    <p>{{($transaction->member->name)}}</p>
                  </div>
                </div>                
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Tanggal Peminjaman</label>
                  </div>
                  <div class="col-md-4 ">
                    <p>{{($transaction->date_start)}}</p>
                  </div>
                  <div class="col-md-1">
                    <label>-</label>
                  </div>
                  <div class="col-md-4">
                    <?php
                    if ($transaction->status == 0) {
                      echo "Belum Dikembalikan";
                    } else {
                      echo $transaction->date_end;
                    };
                    ?>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Buku</label>
                  </div>
                  <div class="col-md-9">
                    <div>
                      @foreach ($transaction->transactionDetails as $detail)
                      <li>{{ $detail->book->title }}</li>                          
                      @endforeach
                    </div>                   
                  </div>                
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Status</label>
                  </div>
                  <div class="col-md-9">
                    <div>
                      @if ($transaction->status == 0)
                      <p> Belum Dikembalikan</p>
                      @else
                      <p> Sudah Dikembalikan <i class="fas fa-check"></i> </p>
                      @endif                     
                      
                    </div>                   
                  </div>                
                </div>
              </div>
                        
            <div class="modal-footer justify-content-between">
              <a href="{{ url('transactions') }}" class="btn btn-warning">Cancel</a>

            </div>
          </div>
        
      </div>
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
  </script>

  
  <!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2(),

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    }),

    //Date picker
    $('#date_start').datetimepicker({
        format: 'L'
    });

  })
</script>
  <script src="{{asset('js/data.js')}}"></script>
@endsection