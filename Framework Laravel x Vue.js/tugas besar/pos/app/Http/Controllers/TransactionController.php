<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransDetail;
use Illuminate\Http\Request;


class TransactionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $customers = Customer::all();
        $transDetails = TransDetail::all();
        $products = Product::all()->where('qty', '>', 0);
        $transactions = Transaction::select('transactions.id', 'payment', 'customers.name')
            ->join('customers', 'customers.id', '=', 'customer_id')
            ->get();

        return view('admin.transaction.transaction', compact('transactions', 'customers', 'transDetails', 'products'));
    }

    public function api()
    {
        $transactions = Transaction::select('transactions.id', 'customer_id', 'payment', 'name', 'transactions.created_at as created')
            ->join('customers', 'customers.id', '=', 'customer_id')
            ->get();


        foreach ($transactions as $transaction) {
            if ($transaction->payment == 0) {
                $transaction->payment = "Cash";
            } else if ($transaction->payment == 1) {
                $transaction->payment = "Credit Card";
            }
            $total_products = TransDetail::selectRaw("SUM(qty) as sumTotal_product")
                ->where('transaction_id', $transaction->id)
                ->get();
            foreach ($total_products as $total_product) {
                $transaction->total_product = $total_product->sumTotal_product;
            }
            $total_prices = TransDetail::selectRaw("SUM(trans_details.qty * price) as sumTotal_price")
                ->join('products', 'products.id', '=', 'product_id')
                ->where('transaction_id', $transaction->id)->get();
            foreach ($total_prices as $total_price) {
                $transaction->total_price = formatRP($total_price->sumTotal_price);
            }
        }

        $datatables = datatables()->of($transactions)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $products = Product::all();
        $customers = Customer::all();
        $transd = TransDetail::where('transaction_id', $transaction->id)->get();

        if ($transaction->payment == 0) {
            $transaction->payment = "Cash";
        } else {
            $transaction->payment = "Credit Card";
        }

        return view('admin.transaction.detail', compact('transaction', 'products', 'customers', 'transd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $deleteTD = TransDetail::where('transaction_id', $transaction->id)->delete();

        if ($deleteTD) {
            $transaction->delete();
        }
    }
}
