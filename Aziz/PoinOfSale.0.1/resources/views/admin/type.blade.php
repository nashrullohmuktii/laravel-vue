@extends('layouts.admin')
@section('header', 'Type')

@section('css')
<!--Datatables-->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="row">
            <div class="col-md-10">
                <a href ="#" @click="addData()" class="btn btn-sm btn-primary pull right">Create New Type</a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table id ="datatable" class="table table-hover text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class=text-center>No.</th>
                    <th class=text-center>Name</th>
                    <th class=text-center>Code</th>
                    <th class=text-center>Suplier</th>
                    <th class=text-center>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off"  @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Type</h4>
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
                                    <label >Code</label>
                                    <input type="number" name="code" class="form-control" :value="data.code" placeholder="Code Number" required="">
                                </div>
                                <div class="form-group">
                                    <label>Suplier</label>
                                    <select name="suplier_id" class="form-control" required="">
                                        @foreach($supliers as $suplier)
                                            <option :selected="data.suplier_id == {{$suplier->id}}" value="{{$suplier->id}}">{{$suplier->name}}</option>
                                        @endforeach
                                    </select>
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
    var actionUrl = '{{url('types')}}';
    var apiUrl = '{{ url('api/types') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'code', class: 'text-center', orderable: false},
        {data: 'suplier_id', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta){
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable:false, width:'200px', class: 'text-center'},
    ];
</script>

<script src="{{asset('js/data.js')}}"></script>
@endsection