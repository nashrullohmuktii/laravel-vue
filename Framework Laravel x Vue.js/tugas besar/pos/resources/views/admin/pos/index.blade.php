@extends('layouts.main')
@section('header', 'Cashier')

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

                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" data-toggle="modal" data-target="#modal-item" class="btn btn-primary pull-right">Cari Barang</button>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-secondary refresh">refresh</i></button>
                        </div>
                      </div>
                </div>
                    <!-- /.card-header -->
                    <form action="{{ url('pos') }}" method="post">
                    <div class="card-body">
                        @csrf                        

                        <div class="row">
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="product_code">Product Code</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="text" autocomplete="off" id="product_code" name="product_code" class="form-control">
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </form>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body table-responsive p-0" style="height: 250px;">

                        
                                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name Product</th>
                                            <th>Price/pcs</th>
                                            <th>Qty</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="product-ajax">
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <select name="customer_id" class="form-control">
                                        <option value="">Selet Customer</option>
                                        @foreach($customers as $customer)
                                        <option value="{{ $customer->c_id }}">{{ $customer->c_name }}</option>
                                        @endforeach
                                    </select>
                                    <label>New Customer</label>
                                        <a href="{{ url('customers') }}">Click here to add new cutomer</a>
                                </div>
                                <div>
                                    <label>Payment:</label>
                                    <div class="form-check form-check-inline">
                                        <label for="status">
                                            <div class="form-control border-0">
                                                <input type="radio" name="payment" value="0" id="radio_1">
                                                <label for="radio_1"> Cash </label>
                                            </div>
                                            <div class="form-control border-0">
                                                <input type="radio" name="payment" value="1" id="radio_2">
                                                <label for="radio_2"> Credit Card </label>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </div>




    <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">TEST</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Product</th>
                                    <th>Kode product</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $i => $data)
                                <tr>
                                    <td>{{ $data->p_name }}</td>
                                    <td>{{ $data->product_code }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->qty }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-info select" 
                                        data-id="{{ $data->id }}"
                                        data-code="{{ $data->product_code }}"
                                        data-name="{{ $data->p_name }}">
                                            <i class="fa fa-check">select</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
  
@endsection

@section('js')
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Code product/get_product with press enter -->
<script type="text/javascript">
$(document).ready(function(){

    $("input[name='product_code']").focus();    

    $("input[name='product_code']").keypress(function(e){
        if(e.which == 13){
            e.preventDefault();
            var code = $(this).val();
            var url = "{{ url('products/ajax') }}"+'/'+code;
            var _this = $(this);

            $.ajax({
                type:'get',
                dataType:'json',
                url:url,
                success:function(data){
                    console.log(data);
                    _this.val('');

                    var isi = ''

                    isi += '<tr>';

                    isi += '<td>';
                        isi += '<input type="text" class="name" name="name[]" value="'+data.data.name+'" disabled style="border:none; background-color:transparent"><input type="hidden" class="product_code" name="product_code[]" value="'+data.data.product_code+'">';
                    isi += '</td>'
                    isi += '<td>';
                        isi += '<input type="number" class="price" name="price[]" value="'+data.data.price+'" disabled style="border:none; background-color:transparent"><input type="hidden" class="product_id" name="product_id[]" value="'+data.data.id+'">';
                    isi += '</td>';
                    isi += '<td>';
                        isi += '<input type="number" class="qty" name="qty[]" value="1">';
                    isi += '</td>';
                    isi += '<td class="text-center">';
                        isi += '<button id="delete" class="btn btn-xs btn-danger delete" data-name1="'+data.data.name+'" data-price="'+data.data.price+'" data-qty1="1" ><i class="fas fa-trash">delete</i></button>';
                    isi += '</td>';

                    isi += '</tr>';

                    var total_harga = parseInt($("input[name='total_harga']").val());
                    total_harga += data.data.price;
                    $("input[name='total_harga']").val(total_harga);


                    $('.product-ajax').append(isi);                
                }
            })
        }
    });
    // Select Product dan masuk masuk ke table
    $('body').on('click', '.select', function() {
            var p_code = $(this).data('code');
            $('#product_code').val(p_code);

            $("#modal-item").modal('hide');
        });


        $('body').on('click', '.select', function() {
        var p_code = $(this).data('code');
        var url = "{{ url('products/ajax') }}"+'/'+p_code;
        var _this = $('#product_code');

        $.ajax({
            type:'get',
            dataType:'json',
            url:url,
            success:function(data){
                console.log(data);
                _this.val(p_code);

                var isi = ''

                isi += '<tr>';

                isi += '<td>';
                    isi += '<input type="text" class="name" name="name[]" value="'+data.data.name+'" disabled style="border:none; background-color:transparent"><input type="hidden" class="product_code" name="product_code[]" value="'+data.data.product_code+'">';
                isi += '</td>'
                isi += '<td>';
                    isi += '<input type="number" class="price" name="price[]" value="'+data.data.price+'" disabled style="border:none; background-color:transparent"><input type="hidden" class="product_id" name="product_id[]" value="'+data.data.id+'">';
                isi += '</td>';
                isi += '<td>';
                    isi += '<input type="number" class="qty" name="qty[]" value="1">';
                isi += '</td>';
                isi += '<td class="text-center">';
                    isi += '<button id="delete" class="btn btn-xs btn-danger delete" data-name1="'+data.data.name+'" data-price="'+data.data.price+'" data-qty1="1" ><i class="fas fa-trash">delete</i></button>';
                isi += '</td>';

                isi += '</tr>';

                var total_harga = parseInt($("input[name='total_harga']").val());
                    total_harga += data.data.price;
                    $("input[name='total_harga']").val(total_harga);

                $('.product-ajax').append(isi);

                }
            });

            $("#modal-item").modal('hide');
        });
    // btn refresh
    $('.refresh').click(function() {
    location.reload();
    });

    // btn delete
    $('body').on('click', '.delete', function(e){
        e.preventDefault();
        var dataPrice = $(this).data('price');
        row = $(this).parents('tr');

        totalBayarNow = $("input[name='total_harga']").val();
        totalBayarfix = totalBayarNow - dataPrice;

        alert('Are you sure?');
        row.remove();

        $("input[name='total_harga']").val(totalBayarfix);
        var jumlah_uang = $("input[name='jumlah_uang']").val();

        kembalian = jumlah_uang - totalBayarfix;
        
        $("input[name='kembalian']").val(kembalian);
    });

})
</script>
<!-- Datatable di modal -->
<script type="text/javascript">
$(function () {
$("#datatable").DataTable();
});

</script>

@endsection