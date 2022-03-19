@extends('layouts.main')
@section('header', 'Data Category')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add new category</a>
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Name</th>
                                    <th>Category Code</th>
                                    <th>Supplier</th>
                                    <th class='text-center'>Action</th>
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

                <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                    
                    <div class="modal-header">
                        <h5 type="hidden" class="modal-title" v-if="editStatus" >Edit Category</h5>
                        <h5 type="hidden" class="modal-title" v-else="editStatus">Add new Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" :value="data.name" placeholder="Enter name" required="">
                        </div>
                        <div class="form-group">
                            <label for="kategori_code">Category Code</label>
                            <input type="text" class="form-control" name="kategori_code" :value="data.kategori_code" placeholder="Enter code category" required="">
                        </div>
                        <div class="form-group">
                            <label for="suplier_id">Supplier</label>
                            <select name="suplier_id" class="form-control">
                                <option value="">Selet Supplier</option>
                                @foreach($supliers as $suplier)
                                <option :selected="data.suplier_id == {{ $suplier->id }}" value="{{ $suplier->id }}">{{ $suplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    var actionUrl = '{{ url('kategoris') }}';
    var apiUrl = '{{ url('api/kategoris') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'kategori_code', class: 'text-center', orderable: true},
        {data: 'suplier_name', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta) {
            return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                    Edit
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                    Delete 
                </a>` ;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ url('js/data.js') }}">{{}}</script>
@endsection