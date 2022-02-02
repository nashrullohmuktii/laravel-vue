<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

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
        // $members = Member::with('user')->get();
        //$books = Book::with('author')->get();
        //$books = Book::with('publisher')->get();
        //$books = Book::with('catalog')->get();

        //$publishers = Publisher::with('books')->get();
        //$catalogs = Catalog::with('books')->get();
        //$authors = Author::with('books')->get();

        //Query Builder
        
        // no 1
        //$data = Member::select('*')
        //            ->where('members.name','like','%admin%')
        //            ->get();
        //        
        // no 2
        //$data2 = Member::select('*')
        //        ->where('email','not like','%admin%')
        //        ->get();

        // no 3
        //$data3 = Transaction::select('members.id','members.name')
        //        ->rightJoin('members','members.id','=','transactions.member_id')
        //        ->where('transactions.member_id', NULL)
        //        ->get();

        // no 4        
        //$data4 = Transaction::select('members.id','members.name','members.phone_number')
        //        ->distinct()
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->get();

        //no 5
        //$data5 = Transaction::select('members.id','members.name','members.phone_number')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->groupBy('members.id')
        //        ->havingRaw('count(members.id) > ?',[1])
        //        ->get();

        // no 6
        //$data6 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->get();
        
        // no 7
        //$data7 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->whereMonth('date_end','=','6')
        //        ->get();
        
        // no 8
        //$data8 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->whereMonth('date_start','=','5')
        //        ->get();

        // no 9
        //$data9 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->whereMonth('date_start','=','6')
        //        ->whereMonth('date_end','=','6')
        //        ->get();

        // no 10
        //$data10 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->rightJoin('members','members.id','=','transactions.member_id')
        //        ->where('address','like','%bandung%')
        //        ->get();

        // no 11
        //$data11 = Transaction::select('members.name','members.phone_number','members.address','date_start','date_end')
        //        ->rightJoin('members','members.id','=','transactions.member_id')
        //        ->where([['address','like','%bandung%'],['gender','p']])
        //        ->get();

        // no 12
        //$data12 = TransactionDetail::select('members.name','members.phone_number','members.address','date_start','date_end','isbn','transaction_details.qty')
        //        ->join('books','books.id','=','transaction_details.book_id')
        //        ->join('transactions','transactions.id','=','transaction_details.transaction_id')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->where('transaction_details.qty','>', '1')
        //        ->get();

        // no 13
        //$data13 = TransactionDetail::select('name','members.phone_number','members.address','date_start','date_end','isbn','transaction_details.qty','title','price')
        //        ->selectRaw('transaction_details.qty * price as total_price')
        //        ->join('books','books.id','=','transaction_details.book_id')
        //        ->join('transactions','transactions.id','=','transaction_details.transaction_id')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->get();

        // no 14
        //$data14 = TransactionDetail::select('members.name','members.phone_number','members.address','date_start','date_end','isbn','transaction_details.qty','title','publishers.name','authors.name','catalogs.name')
        //        ->selectRaw('transaction_details.qty * price as total_price')
        //        ->join('books','books.id','=','transaction_details.book_id')
        //        ->join('transactions','transactions.id','=','transaction_details.transaction_id')
        //        ->join('members','members.id','=','transactions.member_id')
        //        ->join('publishers','publishers.id','=','books.publisher_id')
        //        ->join('authors','authors.id','=','books.author_id')
        //        ->join('catalogs','catalogs.id','=','books.catalog_id')
        //        ->get();

        // no 15
        //$data15 = Catalog::select('*')
        //        ->join('books','catalog_id','=','catalogs.id')
        //        ->get();

        // no 16
        //$data16 = Book::select('books.*','authors.name')
        //        ->rightJoin('authors','authors.id','=','author_id')
        //        ->get();

        // no 17
        //$data17 = Book::selectRaw('count(*) as authors_total')
        //        ->join('authors','authors.id','=','author_id')
        //        ->where('authors.name','=','Pengarang 5')
        //        ->get();

        // no 18
        //$data18 = Book::select('*')
        //        ->where('price','>','10000')
        //        ->get();

        // no 19
        //$data19 = Book::select('books.*')
        //        ->join('publishers','publishers.id','=','publisher_id')
        //        ->where('publishers.name','=','penerbit 01')
        //        ->where('qty','>','10')
        //        ->get();

        // no 20
        //$data20 = Member::select('*')
        //        ->whereMonth('created_at','=','6')
        //        ->get();
        

        //return $data20;
        return view('home');
    }
}
