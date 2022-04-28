@extends('layouts.admin')
@section('header','Checkout')

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
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">

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
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Checkout</a>
                        </div>
                        {{--<div class="col-md-3">
                            <select class="form-control" name="date_start">
                                <option value="">Checkout Date</option>
                                    @foreach ($checkouts as $checkout)
                                <option value="{{$checkout->date_start}}">{{date_start($checkout->date_start)}}</option>
                                    @endforeach
                            </select>
                        </div>--}}
                        <div class="col-md-3">
                            <select class="form-control" name="status">
                                <option value="">All Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Success</option>
                                
                            </select>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table id="datatable" class="table table-striped text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No.</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Total Product</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{--Created--}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off"  @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">New checkout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Date</label>
                                    <input type="date" name="date_start" class="form-control" :value="data.date_start" placeholder="Date" required="">
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control" required="">
                                        @foreach($customers as $customer)
                                            <option :selected="data.customer_id == {{$customer->id}}" value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <div class="select2-purple">
                                        <select name="product_id[]" class="select2" multiple="multiple" data-placeholder="Select a Product" data-dropdown-css-class="select2-purple" required="">
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name_product}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

    {{--Edit--}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off"  @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">New checkout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Date</label>
                                    <input type="date" name="date_start" class="form-control" :value="data.date_start" placeholder="Date" required="">
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control" required="">
                                        @foreach($customers as $customer)
                                            <option :selected="data.customer_id == {{$customer->id}}" value={{$customer->id}}>{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <div class="select2-purple">
                                        <select name="product_id[]" class="select2" multiple="multiple" data-placeholder="Select a Product" data-dropdown-css-class="select2-purple" required="">
                                            @foreach($products as $product)
                                                @foreach($konfirmations as $konfirmation)
                                                    <option {{$konfirmation->product_id==$product->id? 'selected' : ''}}  value="{{$product->id}}">{{$product->name_product}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required="" :value="data.status">
                                        <option :selected="data.status" value="0">Pending</option>
                                        <option :selected="data.status" value="1">Success</option>
                                    </select>
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Updated</button>
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
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script type="text/javascript">
    var actionUrl = '{{url('checkouts')}}';
    var apiUrl = '{{url('api/checkouts')}}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'date1', class: 'text-center', orderable: true},
        {data: 'customer_id', class: 'text-center', orderable: true},
        {data: 'total_product', class: 'text-center', orderable: true},
        {data: 'total_price', class: 'text-center', orderable: true},
        {data: 'status', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta) {
            return `
                <a href="{{url('checkouts/'.'${data.id}'.'show')}}" class="btn btn-info btn-sm">Detail</a>
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData2(event, ${meta.row})">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{asset('js/data.js')}}"></script>

<!-- Page specific script -->
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();

        //Initialize Select2 Elements
    $('.select2').select2()

        //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'})
        
    });
</script>

<script type="text/javascript">
    $('select[name=status]').on('change', function(){
        status = $('select[name=status]').val();

        if (status == ""){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?status='+status).load();
        }
    });
</script>
@endsection
