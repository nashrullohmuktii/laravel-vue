<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
    public function dashboard()
    {
    }

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
        $totalBook = Book::count();
        $totalAuthor = Author::count();
        $publisherData = Publisher::count();
        $transactionData = Transaction::whereMonth('date_start', date('m'))->count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderBy('publisher_id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('publishers.name')->pluck('publishers.name');

        $label_bar = ['Borrowing', 'Return'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('totalBook', 'totalAuthor', 'publisherData', 'transactionData', 'data_donut', 'label_donut', 'data_bar'));
    }
}
