@extends('layouts.admin')


@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('title-web', 'Transaction')
@section('header', 'Edit Transaction')

@section('content')
<div class="row">
            <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('transactions/'.$transaction->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Members</label>
                        <select name="member_id" class="form-control">
                            @foreach($members as $members)
                                <option value="{{$members->id}}" {{ $transaction->member_id == $members->id ? 'selected' : '' }}> {{ $members->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date Start</label>
                                <input type="date" name="date_start" class="form-control" value="{{ $transaction->date_start }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date End</label>
                                <input type="date" name="date_end" class="form-control" value="{{ $transaction->date_end }}" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                    <label>Books</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" name="book_id[]" data-placeholder="Select Books" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            @foreach($books as $books)
                                @foreach($transactionDetails as $key => $transactionDetail)
                                    <option value="{{$books->id}}" {{ $transactionDetail->book_id == $books->id ? 'selected' : '' }}> {{ $books->title }}</option>
                                @endforeach
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="status" id="radioSuccess2" value="0" {{ $transaction->status == '0' ? 'checked' : '' }}>
                        <label for="radioSuccess2">Active
                        </label>
                        <input type="radio" name="status" id="radioSuccess3" value="1" {{ $transaction->status == '1' ? 'checked' : '' }}>
                        <label for="radioSuccess3">Returned
                        </label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>      
    </div> 
@endsection

@section('js')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('.select2').select2()
    });
</script>
@endsection

