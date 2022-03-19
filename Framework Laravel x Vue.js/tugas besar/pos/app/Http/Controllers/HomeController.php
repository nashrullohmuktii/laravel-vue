<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Suplier;
use App\Models\Transaction;
use App\Models\TransDetail;
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

        $totalProduct = Product::count();
        $totalTrans = Transaction::count();
        $totalCustomer = Customer::count();
        $totalSuplier = Suplier::count();

        $label_bar = ['Transactions', 'Total Product Sold'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
                } else {
                    $data_month[] = TransDetail::selectRaw("SUM(qty) as total")->whereMonth('created_at', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('totalProduct', 'totalTrans', 'totalCustomer', 'totalSuplier', 'data_bar'));
    }
}
