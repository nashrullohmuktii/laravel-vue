@extends('layouts.admin')

@section('header')
    Book
@endsection

{{-- @section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection --}}

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
                </div>
                
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">
                    Create New Book
                </button>
            </div>
        </div>       
        <hr>

        <div class="row ml-2">
            <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
                <div class="info-box" v-on:click="editData(book)">
                    <div class="info-box-content">
                        <span class="info-box-text h3">@{{ book.title }} (@{{ book.qty }}) </span>
                        <span class="info-box-number">Rp @{{ numberPrice(book.price) }},-<small></small></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, book.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Book</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
            
                        @csrf          
                        
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                        <label>ISBN</label>
                        <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" :value="book.isbn">
                        </div>
                        <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" :value="book.title">
                        </div>
                        <div class="form-group">
                        <label>Year</label>
                        <input type="number" name="year" class="form-control" placeholder="Enter Year" :value="book.year">
                        </div>
                        <div class="form-group">
                        <label>Publisher</label>
                        <select name="publisher_id" class="form-control">
                            @foreach ($publishers as $publisher)
                            <option :selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>    
                            @endforeach                            
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Author</label>
                        <select name="author_id" class="form-control">
                            @foreach ($authors as $author)
                            <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>    
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Catalog</label>
                        <select name="catalog_id" class="form-control">
                            @foreach ($catalogs as $catalog)
                            <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>    
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="qty" class="form-control" placeholder="Enter quantity" :value="book.qty">
                        </div>
                        <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" :value="book.price">
                        </div>  
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" v-on:click="deleteData(book.id)" v-if="editStatus" >Delete</button>
                        <button type="submit" class="btn btn-primary ml-auto">Enter</button>
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
    <script type="text/javascript">
        var actionUrl = '{{ url('books') }}';
        var apiUrl = '{{ url('api/books') }}';

        var app = new Vue({
            el: '#controller',
            data:{
                books: [],
                book: {},
                editStatus: false,
                search:'',
                actionUrl,
                apiUrl
            },

            mounted: function () {
                this.get_books();
            },

            methods: {
                get_books() {
                    const _this = this;
                    $.ajax({
                        url:apiUrl,
                        methode: 'GET',
                        success: function(data) {
                            _this.books = JSON.parse(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }                                            
                    });
                },

                addData() {
                    this.book = {};        
                    this.editStatus = false;
                    $('#modal-default').modal();
                },

                editData(book) {
                    this.book = book;       
                    this.editStatus = true;
                    $('#modal-default').modal();
                },

                deleteData(id) {                      
                    if (confirm("Are You Sure?")) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response=>{
                        this.get_books();
                        alert('Data have been removed');
                    });
                    }
                },
                
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    this.get_books();                
                    });
                },

                numberPrice(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },

            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        })
    </script>
@endsection

