@extends('layouts.main')
@section('header', 'Data Product')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add new product</a>
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Name</th>
                                    <th>Product code</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Category</th>
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
                        <h5 type="hidden" class="modal-title" v-if="editStatus" >Edit Product</h5>
                        <h5 type="hidden" class="modal-title" v-else="editStatus">Add new Product</h5>
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
                            <label for="product_code">Product code</label>
                            <input type="text" class="form-control" name="product_code" :value="data.product_code" placeholder="Enter code product" required="">
                        </div>
                        <div class="form-group">
                            <label for="qty">Stock</label>
                            <input type="number" class="form-control" name="qty" :value="data.qty" placeholder="Enter Stock" required="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" :value="data.price" placeholder="Enter prices" required="">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Category</label>
                            <select name="kategori_id" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach($kategoris as $kategori)
                                <option :selected="data.kategori_id == {{ $kategori->id }}" value="{{ $kategori->id }}" >{{ $kategori->name }}</option>
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
    var actionUrl = '{{ url('products') }}';
    var apiUrl = '{{ url('api/products') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'product_code', class: 'text-center', orderable: true},
        {data: 'qty', class: 'text-center', orderable: true},
        {data: 'price', class: 'text-center', orderable: true},
        {data: 'kategori_name', class: 'text-center', orderable: true},
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