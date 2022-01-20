@extends('layouts.admin')
@section('header')
    Member
@endsection


@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


@section('content')
<div id="controller">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add New Member</a> 
      </div>
      
      <!-- /.card-header -->
      <div class="card-body pl-3 mt-2 mb-2">
          <table id="datatable" class="table table-bordered table-striped mr-2">
          <thead>
            <tr class="text-center">
              <th style="width: 10px">No</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
          <div class="modal-header">
            <h4 class="modal-title">Author</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  
          <div class="modal-body">

            @csrf          
            
            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required="">
            </div>
            <div class="form-group">
              <label>Gender</label>
              <input type="text" name="gender" class="form-control" placeholder="Enter Gender (M/F)" :value="data.gender" required="">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" :value="data.phone_number" required="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required="">
            </div>          
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enter</button>
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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
  var actionUrl = '{{ url('members') }}';
  var apiUrl = '{{ url('api/members') }}';

  var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true},
    {data: 'name', class: 'text-center', orderable: true},
    {data: 'gender', class: 'text-center', orderable: false},
    {data: 'phone_number', class: 'text-center', orderable: false},
    {data: 'address', class: 'text-center', orderable: false},
    {data: 'email', class: 'text-center', orderable: false},
    {data: 'date', class: 'text-center', orderable: false},
    {render: function (index, row, data, meta) {
      return `
        <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
          Edit
        </a>
        <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
          Delete
        </a>`;
    }, orderable: false, width:'200px', class:'text-center'},
  ];

</script>
<script src="{{asset('js/data.js')}}"></script>


<!-- Page specific script -->
{{-- <script type="text/javascript">
  $(function () {
    $("#table").DataTable();
    // $("#table").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#table').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script> --}}

{{-- CRUD VUE js --}}
    {{-- <script type="text/javascript">
      var controller = new Vue ({
          el: '#controller',
          data: {
            data: {},
            actionUrl: '{{ url('authors') }}',
            editStatus: false,
          },
          mounted: function() {
            
          },
          methods: {
            addData() {
              this.data = {};
              this.actionUrl = '{{ url('authors') }}';
              this.editStatus = false;
              $('#modal-default').modal();
            },
            editData(data) {
              this.data = data;
              this.actionUrl = '{{ url('authors') }}' + '/' + data.id;
              this.editStatus = true;
              $('#modal-default').modal();
            },
            deleteData(id) {              
              this.actionUrl = '{{ url('authors') }}' + '/' + id;
              if (confirm("Are You Sure?")) {
                axios.post(this.actionUrl, {_method: 'DELETE'}).then(response=>{
                  location.reload();
                });
              }
            }
          }
      });
    </script> --}}
@endsection
