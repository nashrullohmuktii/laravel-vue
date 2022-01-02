@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection 

@section('title-web', 'Book')
@section('header', 'Book')


@section('content')
<div id="controller" class="controller">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" autocomplete="off" placeholder="Search by title" v-model="search">
            </div>
        </div>
        <div class="cold-md-2">
            <button class="btn btn-primary" @click="addData()">Create New Book</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in dataBuku">
            <div class="info-box">
                <div class="info-box-content" v-on:click="editData(book)">
                    <span class="info-box-text h4">@{{ book.title }} (@{{ book.qty }})</span>
                    <p>@{{ book.date }}</p>
                    <span class="info-box-number">Rp @{{ formatNumberRupiah(book.price) }}<small>,-</small></span>
                </div>
            </div>
        </div>
    </div>

    <!-- modal start -->
        <div class="modal fade" id="modal-buku">
            <div class="modal-dialog">
                <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off" @submit="submitform($event, book.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            @csrf  
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus"> 
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" required :value="book.isbn"> 
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required :value="book.title"> 
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" class="form-control" name="year" required :value="book.year"> 
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control">
                                    @foreach($publishers as $publisher)
                                    <option :selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control">
                                    @foreach($authors as $author)
                                    <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control">
                                    @foreach($catalogs as $catalog)
                                    <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty" required :value="book.qty"> 
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" required :value="book.price"> 
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default bg-danger" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end modal -->
</div>
@endsection

@section('js')
<script type="text/javascript">
    var actionUrl = '{{ url('books') }}';
    var apiUrl = '{{ url('api/books') }}';

    var app = new Vue({
        el: '#controller',
        data: {
            books: [],
            search: '',
            actionUrl,
            apiUrl,
            book: {},
            editStatus : false
        },
        mounted: function(){
            this.get_books();
        },
        methods: {
            get_books(){
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(data){
                        _this.books = JSON.parse(data);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            },
            addData(){
                this.book = {};
                this.actionUrl = '{{ url('books') }}';
                this.editStatus = false;
                $('#modal-buku').modal();
            },
            editData(data){
                this.book = data;
                this.actionUrl = '{{ url('books') }}' + '/' + data.id;
                this.editStatus = true;
                $('#modal-buku').modal();
            },
            deleteData(id){
                this.actionUrl = '{{ url('books') }}' + '/' + id;
                if(confirm("Are you sure ? ")){
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                        location.reload();
                    });
                }
            },
            formatNumberRupiah(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        },
        computed: {
                dataBuku() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
    });

</script>
@endsection
