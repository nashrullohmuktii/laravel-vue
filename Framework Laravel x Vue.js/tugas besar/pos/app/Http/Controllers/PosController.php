<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransDetail;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class PosController extends Controller
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

    public function index()
    {
        $customers = Customer::select('id as c_id', 'name as c_name')->get();
        $products = Product::select('id as p_id', 'name as p_name', 'product_code', 'price', 'qty')->where('qty', '>', 0)->get();

        return view('admin.pos.index', compact('customers', 'products'));
    }

    public function get_product($product_code)
    {
        $pd = Product::where('product_code', $product_code)->where('qty', '>', 0)->first();

        return response()->json([
            'data' => $pd
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_id' => 'required',
            'payment' => 'required|numeric',
            'qty' => 'required',
        ]);

        $products = $request->product_id;
        $customers = $request->customer_id;
        $payment = $request->payment;
        $qty = $request->qty;

        DB::transaction(function () use ($products, $qty, $customers, $payment) {
            $tr = Transaction::insertGetId([
                'customer_id' => $customers,
                'payment' => $payment,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            foreach ($products as $i => $pd) {
                TransDetail::insert([
                    'transaction_id' => $tr,
                    'product_id' => $pd,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'qty' => $qty[$i],
                ]);

                $product1 = Product::find($pd);
                $qtyNow = $product1->qty;
                $qtyUpdated = $qtyNow - $qty[$i];

                Product::where('id', $pd)->update([
                    'qty' => $qtyUpdated,
                ]);
            }
        });
        return redirect('transactions')->with('status', 'Transaction success');
    }
}
