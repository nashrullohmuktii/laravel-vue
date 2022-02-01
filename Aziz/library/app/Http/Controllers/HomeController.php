<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Catalog;
use App\Member;
use App\Publisher;
use App\Transaction;
use App\TransactionDitail;
use Illuminate\Support\Facades\DB;
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
        //No. 1
        //$data = Member::select('*')
                   //->where('name','like','%admin%')
                   //->get();
        
        //return $data;
        
        //No. 2
        //$data2 = Member::select('*')
                    //->where('name','not like','%admin%')
                    //->get();
        
        //return $data2;

        //No. 3
        //$data3 = Transaction::select('members.id', 'members.name')
                     //->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                     //->where('transactions.member_id', NULL)
                     //->get();
        
        //return $data3;
        
        //No. 4
        //$data4 = Transaction ::select('members.id','members.name','members.phone_number')
                      //->Join('members','transactions.member_id','=','members.id')
                      //->get();
        
        //return $data4;

        //No.5
        //$data5 = Member::select('members.id', 'members.name', DB::raw('count(members.id) as kali_peminjaman'))
                    //->join('transactions', 'members.id', '=', 'transactions.member_id')
                    //->groupBy( 'members.id','members.name')
                    //->having('kali_peminjaman', '>', 1)
                    //->get();
        
        //return $data5;

        //No. 6
        //$data6 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->Join('members','transactions.member_id','=','members.id')
                    //->get();
        
        //return $data6;

        //No. 7
        //$data7 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->join('members','transactions.member_id','=','members.id')
                    //->whereMonth('transactions.date_end','=',06)
                    //->get();

        //return $data7;

        //No.8
        //$data8 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->join('members','transactions.member_id','=','members.id')
                    //->whereMonth('transactions.date_start','=',05)
                    //->get();
        
        //return $data8;

        //No.9
        //$data9 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->join('members','transactions.member_id','=','members.id')
                    //->whereMonth('transactions.date_start','=',06)
                    //->whereMonth('transactions.date_end','=',06)
                    //->get();
        
        //return $data9;

        //No. 10
        //$data10 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->join('members','transactions.member_id','=','members.id')
                    //->where('members.address','=','Bandung')
                    //->get();

        //return $data10;

        //No. 11
        //$data11 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    //->join('members','transactions.member_id','=','members.id')
                    //->where('members.address','=','Bandung')
                    //->where('members.gender','=','F')
                    //->get();
        
        //return $data11;

        //No.12
        //$data12 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_ditails.qty')
                 //->join('transactions', 'transactions.member_id', '=', 'members.id')
                 //->join('transaction_ditails', 'transaction_ditails.transaction_id', '=', 'transactions.id')
                 //->join('books', 'transaction_ditails.book_id', '=', 'books.id')
                 //->where('transaction_ditails.qty','>',1)
                 //->get();

        //return $data12;

        //No.13
        //$data13 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_ditails.qty','books.title','books.price',DB::raw('(transaction_ditails.qty * books.price) AS total'))
                 //->join('transactions', 'members.id', '=', 'transactions.member_id')
                 //->join('transaction_ditails', 'transaction_ditails.transaction_id', '=', 'transactions.id')
                 //->join('books', 'books.id', '=', 'transaction_ditails.book_id')
                 //->get();

        //return $data13;

        //No.14
        //$data14 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_ditails.qty','books.title','authors.name','publishers.name','catalogs.name')
                 //->join('transactions','transactions.member_id','=','members.id')
                 //->join('transaction_ditails','transaction_ditails.transaction_id', '=', 'transactions.id')
                 //->join('books','books.id','=','transaction_ditails.book_id')
                 //->join('publishers','publishers.id','=','books.publisher_id')
                 //->join('authors','authors.id','=','books.author_id')
                 //->join('catalogs','catalogs.id','=','books.catalog_id')
                 //->get();

        //return $data14;

        //No.15
        //$data15 = Catalog::select('catalogs.*','books.title')
                 //->join('books','books.catalog_id','=','catalogs.id')
                 //->get();

        //return $data15;

        //No.16
        //$data16 = Publisher::select('books.*','publishers.name')
                 //->join('books','books.publisher_id','=','publishers.id')
                 //->get();

        //return $data16;

        //No.17
        //$data17 = Book::select('*')
                 //->where('author_id','=',5)
                 //->get();

        //return $data17;

        //No.18
        //$data18 = Book::select('*')
                 //->where('price','>',10000)
                 //->get();

        //return $data18;

        //No.19
        //$data19 = Book::select('*')
                 //->join('publishers','publishers.id','=','books.publisher_id')
                 //->where('qty','>',10)
                 //->where('publisher_id','=',1)
                 //->get();

        //return $data19;

        //No.20
        //$data20 = Member::select('*')
                 //->whereMonth('created_at','=',06)
                 //->get();

        //return $data20;
    }
}
