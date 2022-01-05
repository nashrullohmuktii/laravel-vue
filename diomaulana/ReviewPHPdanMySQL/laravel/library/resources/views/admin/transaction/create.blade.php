@extends('layouts.admin')


@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('title-web', 'Transaction')
@section('header', 'Create Transaction')


@section('content')
    <div class="row">
            <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Create Transaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('transactions') }}" method="post">
                @csrf
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Members</label>
                        <select name="member_id" class="form-control">
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date Start</label>
                                <input type="date" name="date_start" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date End</label>
                                <input type="date" name="date_end" class="form-control" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                    <label>Books</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" name="book_id[]" data-placeholder="Select Books" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                            </select>
                        </div>
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

