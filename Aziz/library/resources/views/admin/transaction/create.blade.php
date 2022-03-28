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
                <h3 class="card-title">New Transaction</h3>
            </div>

            {{-- menampilkan error validasi --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('transactions') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Member</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            <select type="text" name="member_id" class="form-control" placeholder="select Name" required="">
                                @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Date</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            <input type="date" name="date_start" class=" col-md-5 float-left" required="">
                            ,
                            <input type="date" name="date_end" class="col-md-5 float-right" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Book Title</label>
                        </div>
                        <div class="col-md-8 float-right" style="margin:1%">
                            <select class="select2" name="book_id[]" multiple="multiple" data-placeholder="Select a Book" style="width: 100%;">
                                @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--<div class="form-group">
                        <div class="col-md-3 float-left" style="margin:1%">
                            <label>Status</label>
                        </div>
                        <div class="col-md-8 float-right" name="status2" style="margin:1%">
                            <div class="">
                                <input type="radio" class="form-check-input" value=0 >Has Been Returned
                            </div>
                            <div>
                                <input type="radio" class="form-check-input" value=1 >Not Been Restored
                            </div>
                        </div>
                    </div>--}}
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <a href="{{ url('transactions')}}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endsection
