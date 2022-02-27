<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use App\Models\Member;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
        //data notification
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();
       

        // Data Home       
        $total_member = Member::count();
        $total_buku = Book::count();
        $total_penerbit = Publisher::count();
        $total_peminjaman = Transaction::count();
        // $total_peminjaman = Transaction::whereMonth('date_start', date('m'))->count();
        function rand_color() {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        };
       
        
        
        //Data Penerbit
        $data_donut = Book::select(DB::raw("count(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');
        

        foreach ($label_donut as $key => $value) {
            $warna[$key] = rand_color();
        }

        //Data Penulis
        $data_donut_penulis = Book::select(DB::raw("count(author_id) as total"))->groupBy('author_id')->orderBy('author_id', 'asc')->pluck('total');
        $label_donut_penulis = Author::orderBy('authors.id', 'asc')->join('books', 'books.author_id', '=', 'authors.id')->groupBy('name')->pluck('name');
        

        foreach ($label_donut_penulis as $key => $value) {
            $warna_penulis[$key] = rand_color();
        }
       
       
        //Data Transaksi
        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value){
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];
            
            foreach (range(1,12) as $month){
                if ($key == 0){
                $data_month[] = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_start', $month)->first()->total;
            } else {
                $data_month[] = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_end', $month)->first()->total;
            }
        }

            $data_bar[$key]['data'] = $data_month;
        }
        

        // -Data Home-
        return view('home', compact('total_member', 'total_buku', 'total_penerbit', 'total_peminjaman', 'data_donut', 'label_donut', 'warna','data_donut_penulis', 'label_donut_penulis', 'warna_penulis', 'data_bar', 'transaksi', 'unreturn', 'count'));



        // //Eloguent publisher->Book (hasMany)
        // $publisher = Publisher::with('books')->get();

        // return $publisher;
        // //--//


        // //--Query Builder

        // //No 1
        // $data1 = Member::select('*')
        //         ->join('users', 'members.id','=','users.id')
        //         ->get();

        // //No 2
        // $data2 = Member::select('*')
        //         ->leftjoin('users', 'users.member_id', '=', 'members.id')
        //         ->where('users.member_id', NULL)
        //         ->get();

        // //No 3
        // $data3 = Member::select('members.id', 'name')
        //         ->leftjoin('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->where('transactions.member_id', NULL)
        //         ->get();
        
        // //No 4
        // $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->get();

        // //No 5
        // $data5 = Member::select('members.id', 'members.name', DB::raw('count(members.id) as kali_peminjaman'))
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->groupBy( 'members.id','members.name')
        //         ->having('kali_peminjaman', '>', 1)
        //         ->get();

    

        // //No 6
        // $data6 = Member::select('members.name', 'members.phone_number', 'transactions.date_start', 'transactions.date_end')
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->get();

        // //No 7
        // $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->where('transactions.date_end', '>=', '2021-06-01')
        //         ->get();

        // //No 8
        // $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        // ->join('transactions', 'members.id', '=', 'transactions.member_id')
        // ->where('transactions.date_start', '<=', '2021-06-01')
        // ->get();

        // //No 9
        // $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->where('transactions.date_start', '>=', '2021-06-01', 'AND', 'transactions.date_end', '>=', '2021-06-01')
        //         ->get();

        // //No 10
        // $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //         ->leftJoin('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->where('members.address', 'LIKE', '%bandung%')
        //         ->get();
        
        // //No 11
        // $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //         ->leftJoin('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->where('members.address', 'LIKE', '%bandung%', 'AND', 'members.sex', '=', 'f')
        //         ->get();

        // //No 12
        // $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'date_start', 'date_end', 'books.isbn', DB::raw('SUM(transaction_details.qty) AS qty'))
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //         ->join('books', 'books.id', '=', 'transaction_details.book_id')
        //         ->groupBy('members.name', 'members.phone_number', 'members.address', 'date_start', 'date_end', 'books.isbn','transaction_details.qty', 'transactions.id')
        //         ->having('transaction_details.qty', '>', 1)
        //         ->get();
        
     

        // //No 13
        // $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.title', 'books.price', DB::raw('(transaction_details.qty * books.price) AS total'))
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //         ->join('books', 'books.id', '=', 'transaction_details.book_id')
        //         ->groupBy('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.title', 'books.price', 'total')
        //         ->get();

        // //NO 14
        // $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
        //         ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //         ->join('transaction_details','transaction_details.transaction_id', '=', 'transactions.id')
        //         ->join('books', 'books.id', '=', 'transaction_details.book_id')
        //         ->join('authors', 'authors.id', '=', 'books.author_id')
        //         ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        //         ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
        //         ->get();

        // //No15
        // $data15 = Book::select('books.catalog_id', 'catalogs.name', 'books.title')
        //         ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
        //         ->get();

        // //No16
        // $data16= Book::select('books.id', 'books.isbn', 'books.title', 'books.year', 'publishers.name', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price', 'books.created_at', 'books.updated_at')
        //         ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
        //         ->get();

        // //No17
        // $data17 = Book::select('*')
        //         ->where('publisher_id', '=', 5)
        //         ->get();

        // //No18
        // $data18 = Book::select('*')
        //         ->where('price', '>', 10000)
        //         ->get();

        // //No19
        // $data19 = Book::select('*')
        //         ->where('publisher_id', '=', 1, 'AND', 'qty', '>', 10)
        //         ->get();

        // //No20
        // $data20 = Member::select('*')
        //         ->where('created_at', '>=', '2021-06-01')
        //         ->get();

        // return $data20;
        

        //Home Real
        // return view('home');
    }
}
