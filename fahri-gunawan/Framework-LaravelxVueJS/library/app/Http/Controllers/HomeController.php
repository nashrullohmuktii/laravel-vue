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
        $book = Book::with('publisher', 'author', 'catalog')->get();
        return $book;

        //  TEST PUBLISHER -> Books
        //   $publisher = Publisher::with('books')->get();
        //   return $publisher; 

        // TEST AUTHOR -> Books
        // $author = Author::with('books')->get();
        // return $author;

        // TEST CATALOG -> Books
        // $catalog = Catalog::with('books')->get();
        // return $catalog;







        return view('home');
    }
}
