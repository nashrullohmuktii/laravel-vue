@extends('layouts.admin')
@section('header', 'Product')

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
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Product</a>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table id="datatable" class="table table-striped text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No.</th>
                                <th class="text-center">Name Product</th>
                                <th class="text-center">Type Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Qty</th>
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
                        <h4 class="modal-title">Product</h4>
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
                                    <input type="name" name="name_product" class="form-control" :value="data.name_product" placeholder="Name Product" required="">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type_id" class="form-control" required="">
                                        @foreach($types as $type)
                                            <option :selected="data.type_id == {{$type->id}}" value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Price</label>
                                    <input type="number" name="price" class="form-control" :value="data.price" placeholder="Price" required="">
                                </div>
                                <div class="form-group">
                                    <label >Qty</label>
                                    <input type="number" name="qty" class="form-control" :value="data.qty" placeholder="Qty" required="">
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
    var actionUrl = '{{url('products')}}';
    var apiUrl = '{{url('api/products')}}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name_product', class: 'text-center', orderable: true},
        {data: 'type_id', class: 'text-center', orderable: true},
        {data: 'price', class: 'text-center', orderable: true},
        {data: 'qty', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta) {
            return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{asset('js/data.js')}}"></script>

<!-- Page specific script -->
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();
        
    });
</script>
@endsection
