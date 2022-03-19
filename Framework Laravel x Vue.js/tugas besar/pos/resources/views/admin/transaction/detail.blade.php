@extends('layouts.main')
@section('header', 'Data Transaction')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css?v=3.2.0')}}">
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail Peminjaman</h3>
        </div>
        
        <form>
            <div class="card-body">
                <div class="form-group">
                <label>Nama Anggota</label>
                    <div class="col-md-6">
                        <div class="form-control border-0">
                            <span>{{($transaction->customer->name)}}</span>
                        </div>
                    </div>
                    <br>
                <label>Payment</label>
                    <div class="col-md-4">
                        <div class="form-control">
                            <span>{{ $transaction->payment }}</span>
                        </div>
                    </div>
                <label>Product name</label>
                <div class="form-group">
                    <div>
                        @foreach($transd as $key => $value)
                            <ul>
                                <li>{{ ($value->product->name) }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
                <br>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ url('transactions') }}" class="btn btn-secondary">All Transactions</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection