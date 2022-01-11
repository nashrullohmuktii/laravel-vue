<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* TEST MEMBER -> USER
        *$member = Member::all(); memanggil seluruh data didatabase table member
        *$member = Member::with('user')->get(); //memanggil dengan relasi, contoh 'user'
        *return $member; */

        //TEST MEMBER -> TRANSACTION (DATA KOSONG)
        // $trans = Transaction::all();
        // $trans = Member::with('transaction')->get();
        // return $trans;

        //TEST TRANSACTIONDETAIL -> BOOK - TRANSACTION (DATA KOSONG)
        // $tDetail = TransactionDetail::with('book', 'transaction')->get();
        // return $tDetail;

        // TEST BOOKS -> PUBLISHER - AUTHOR - CATALOG
        // $book = Book::all(); memanggil sluruh data di database table book
        // $book = Book::with('publisher', 'author', 'catalog')->get();
        // return $book;

        //  TEST PUBLISHER -> Books
        //   $publisher = Publisher::with('books')->get();
        //   return $publisher; 

        // TEST AUTHOR -> Books
        // $author = Author::with('books')->get();
        // return $author;

        // TEST CATALOG -> Books
        // $catalog = Catalog::with('books')->get();
        // return $catalog;



        //QUERY BUILDER
        //case soal no1
        $data = Member::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();


        //case soal no2
        $data2 = Member::select('*')
            ->leftjoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', NULL)
            ->get();

        //case soal no3
        $data3 = Transaction::select('members.id', 'members.name')
            ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
            ->where('transactions.member_id', NULL)
            ->get();

        //case soal no4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('members.id', 'ASC')
            ->get();

        //case soal no5
        // $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
        //     ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //     ->groupBy('members.id')
        //     ->having(Transaction::raw('count(member_id)'), '>', 1)
        //     ->get();

        //case soal no6
        $data6 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->get();

        //case soal no7
        $data7 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->whereMonth('date_end', 6)
            ->get();

        //case soal no8
        $data8 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->whereMonth('date_start', 5)
            ->get();

        //case soal no9
        $data9 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->whereMonth('date_start', 6)
            ->whereMonth('date_end', 6)
            ->get();

        //case soal no10
        $data10 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', 'transactions.member_id')
            ->where('address', 'LIKE', '%Bandung%')
            ->get();

        //case soal no11
        $data11 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
            ->join('members', 'members.id', 'transactions.member_id')
            ->where([['address', 'LIKE', '%Bandung%'], ['gender', 'P']])
            ->get();

        //case soal no12
        $data12 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty')
            ->join('members', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->where('transaction_details.qty', 1)
            ->get();

        //case soal no13
        $data13 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty', 'title', 'price')
            ->selectRaw('transaction_details.qty * price as total_price')
            ->join('members', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->get();

        //case soal no14
        $data14 = Transaction::select('members.name as member_name', 'members.phone_number', 'members.address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty', 'title', 'price', 'publishers.name as publisher_name', 'authors.name as author_name', 'catalogs.name as catalog_name')
            ->selectRaw('transaction_details.qty * price as total_price')
            ->join('members', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->join('publishers', 'publishers.id', 'books.publisher_id')
            ->join('authors', 'authors.id', 'books.author_id')
            ->join('catalogs', 'catalogs.id', 'books.catalog_id')
            ->get();

        //case soal no15
        $data15 = Book::select('catalogs.*', 'title as book_title')
            ->join('catalogs', 'catalogs.id', 'books.catalog_id')
            ->orderBy('catalogs.id', 'asc')
            ->get();

        //case soal no16
        $data16 = Book::select('books.*', 'publishers.name as publihser_name')
            ->join('publishers', 'publishers.id', 'books.publisher_id')
            ->orderBy('books.id', 'asc')
            ->get();

        //case soal no17
        $data17 = Book::selectRaw('count(author_id) as total_author')
            ->where('author_id', 5)
            ->get();

        //case soal no18
        $data18 = Book::select('*')
            ->where('price', '>', 10000)
            ->get();

        //case soal no19
        $data19 = Book::select('books.*')
            ->join('publishers', 'publishers.id', 'books.publisher_id')
            ->where('publishers.id', 1)
            ->get();
        //case soal no20
        $data20 = Member::select('*')
            ->whereMonth('created_at', 6)
            ->get();


        // return $data;
        return view('home');
    }
}
