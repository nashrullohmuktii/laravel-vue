<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
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

        // $catalog = Catalog::with('books')->get();
        // $catalog = Catalog::all();
        // return $catalog;

        // kuis mysql
        
        $no1 = Member::select('*')
                ->join('users', 'users.member_id', '=', 'members.id')
                ->get();

        $no2 = Member::select('*')
                ->leftJoin('users', 'users.member_id', '=', 'members.id')
                ->where('users.member_id', NULL)
                ->get();  
                
        $no3 = Member::select('members.id','members.name')
                ->leftJoin('transactions','members.id', '=', 'transactions.member_id')
                ->where('date_start', NULL)
                ->get();
        
        $no4 = Member::select('members.id', 'members.name', 'members.phone_number')
                ->distinct()
                ->join('transactions', 'members.id', '=', 'transactions.member_id')
                ->get();

        $no5 = Transaction::select('members.id', 'members.name', 'members.phone_number')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->groupBy('members.id')
                ->having(Transaction::raw('count(member_id)'), '>', 1)
                ->get();

        $no6 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->get();

        $no7 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->whereMonth('date_end', 6)
                ->get();
        
        $no8 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->whereMonth('date_start', 5)
                ->get();
        
        $no9 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->whereMonth('date_start', 6)
                ->whereMonth('date_end', 6)
                ->get();
        
        $no10 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', 'transactions.member_id')
                ->where('address', 'LIKE', '%Bandung%')
                ->get();
        
        $no11 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end')
                ->join('members', 'members.id', 'transactions.member_id')
                ->where([
                            ['address', 'LIKE', '%Bandung%'],
                            ['gender', 1]
                        ])
                ->get();

        $no12 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty')
                ->join('members', 'members.id', 'transactions.member_id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->where('transaction_details.qty', 1)
                ->get();

        $no13 = Transaction::select('name', 'phone_number', 'address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty', 'title', 'price')
                ->selectRaw('transaction_details.qty * price as total_price')
                ->join('members', 'members.id', 'transactions.member_id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->get();

        $no14 = Transaction::select('members.name as member_name', 'members.phone_number', 'members.address', 'date_start', 'date_end', 'isbn', 'transaction_details.qty', 'title', 'price', 'publishers.name as publisher_name', 'authors.name as author_name', 'catalogs.name as catalog_name')
                ->selectRaw('transaction_details.qty * price as total_price')
                ->join('members', 'members.id', 'transactions.member_id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->join('publishers', 'publishers.id', 'books.publisher_id')
                ->join('authors', 'authors.id', 'books.author_id')
                ->join('catalogs', 'catalogs.id', 'books.catalog_id')
                ->get();

        $no15 = Book::select('catalogs.*', 'title as book_title')
                ->join('catalogs', 'catalogs.id', 'books.catalog_id')
                ->orderBy('catalogs.id', 'asc')
                ->get();

        $no16 = Book::select('books.*', 'publishers.name as publihser_name')
                ->join('publishers', 'publishers.id', 'books.publisher_id')
                ->orderBy('books.id', 'asc')
                ->get();

        $no17 = Book::selectRaw('count(author_id) as total_author')
                ->where('author_id', 5)
                ->get();
        
        $no18 = Book::select('*')
                ->where('price', '>', 10000)
                ->get();
        
        $no19 = Book::select('books.*')
                ->join('publishers', 'publishers.id', 'books.publisher_id')
                ->where('publishers.id', 1)
                ->get();
        
        $no20 = Member::select('*')
                ->whereMonth('created_at', 6)
                ->get();

        // return $no20;

        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(Book::raw("count(publisher_id) as total"))
                ->groupBy('publisher_id')
                ->orderBy('publisher_id', 'asc')
                ->pluck('total');

        $label_donut = Publisher::orderBy('publishers.id', 'asc')
                ->join('books', 'books.publisher_id', 'publishers.id')
                ->groupBy('publishers.id')
                ->pluck('publishers.name');

        $label_bar = ['Borrowing', 'Return'];
        $data_bar = [];

        foreach($label_bar as $key => $value){
                $data_bar[$key]['label'] = $label_bar[$key];
                $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1) ';
                $data_month = [];

                foreach(range(1,12) as $month) {
                        if($key == 0 ){
                        $data_month[] = Transaction::select(Transaction::raw("count(*) as total"))
                                ->whereMonth('date_start', $month)
                                ->first()->total;
                        } else {
                        $data_month[] = Transaction::select(Transaction::raw("count(*) as total"))
                                ->whereMonth('date_end', $month)
                                ->first()->total;       
                        }
                        
                }
                $data_bar[$key]['data'] = $data_month;
        }

        $labels_area = Book::select('title')
                ->orderBy('id', 'asc')
                ->pluck('title');

        
        $data_price = Book::select('price')
                ->orderBy('id', 'asc')
                ->pluck('price');
        $data_qty = Book::select('qty')
                ->orderBy('id', 'asc')
                ->pluck('qty');
        

        return view('home', compact('total_member', 'total_book', 'total_transaction', 'total_publisher' , 'label_donut', 'data_donut', 'data_bar', 'labels_area', 'data_price', 'data_qty' ));
    }
}
