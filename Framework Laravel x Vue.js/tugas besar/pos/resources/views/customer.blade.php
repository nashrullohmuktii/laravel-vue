@extends('layouts.main')
@section('header', 'Data Customer')

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add new customer</a>
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
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
                        <h5 type="hidden" class="modal-title" v-if="editStatus" >Edit Customer</h5>
                        <h5 type="hidden" class="modal-title" v-else="editStatus">Add new Customer</h5>
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
                            <label for="sex">Sex</label>
                            <select name="sex" class="form-control">
                                <option value="" selected>Choose Gender...</option>
                                <option :selected="data.sex == 'm' " value="m" >Male</option>
                                <option :selected="data.sex == 'f' " value="f" >Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" :value="data.phone" placeholder="08xx-xxxx-xxxx" required="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" :value="data.email" placeholder="example@example.com" required="">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" :value="data.address" placeholder="Enter address" required="">
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
    $(function () {
       $("#datatable").DataTable();
       });
</script>
<script type="text/javascript">
    var actionUrl = '{{ url('customers') }}';
    var apiUrl = '{{ url('api/customers') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'sex', class: 'text-center', orderable: true},
        {data: 'phone', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
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
// importdatatables
    var controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        editStatus: false,
    },
    mounted: function () {
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            _this.table = $('#datatable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns: columns,
            }).on('xhr', function () {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            this.data = {};
            this.editStatus = false;
            $('#modal-default').modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(event, id) {
            if (confirm("Are you sure?")) {
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl + '/' + id, { _method: 'DELETE' }).then(response => {
                    alert('Data has been removed!');
                });
            }
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modal-default').modal('hide');
                _this.table.ajax.reload();
            });
        },
      }
    });
</script>
@endsection