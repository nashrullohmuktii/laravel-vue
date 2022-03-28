@extends('layouts.admin')
@section('header, Transaction')

@section('content')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ditail Transaction</h3>
            </div>

            <!-- /.card-header -->
            <!-- form start -->
            
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Member</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            <p>
                                {{$transaction->member->name}}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Date</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            <p>
                                {{$transaction->date_start}}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Book Title</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            @foreach($transactionditails as $transactionditail)
                            <li>
                                {{$transactionditail->title}}
                            </li>
                            @endforeach
                            {{--<p>
                                @foreach($books as $book)
                                    @foreach($transactionditails as $transactionditail)
                                        {{$transactionditail->book_id==$book->id}}>{{$book->title}}
                                    @endforeach
                                @endforeac
                            </p>--}}
                            {{--<select class="select2" name="book_id[]" multiple="multiple" data-placeholder="Select a Book" style="width: 100%;">
                                @foreach($books as $book)
                                    @foreach($transactionditails as $transactionditail)
                                        <option {{$transactionditail->book_id==$book->id? 'selected' : ''}} value="{{$book->id}}">{{$book->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Status</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            @if($transaction->status ==0)
                                <p>Has Been Returned</p>
                            @else
                                <p>Not Been Restoredd</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <a href="{{ url('transactions')}}" class="btn btn-default">Close</a>
                </div>
        </div>
    </div>
</div>
@endsection
