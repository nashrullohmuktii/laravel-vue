@extends('layouts.admin')


@section('title-web', 'Transaction')
@section('header', 'Detail Transaction')

@section('content')
<div class="row">
            <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Detail Transaction</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Members</label>
                        <p>{{$member[0]->name}}</p>
                    </div>
                    <div class="form-group">
                        <label>Date Start</label>
                        <p>{{format_dated($transaction->date_start)}}</p>
                    </div>
                    <div class="form-group">
                        <label>Book</label>
                        <ul>
                            @foreach($transactionDetails as $transactionDetail)
                            <li> {{ $transactionDetail->title }}</li>
                            @endforeach
                        </ul>
                        
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        @if($transaction->status == 0)
                            <p class="text-warning">Active</p>
                        
                        @else
                            <p class="text-success">Returned</p>
                        
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>      
    </div> 
@endsection

