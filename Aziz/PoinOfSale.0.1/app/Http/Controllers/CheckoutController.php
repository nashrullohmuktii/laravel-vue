<?php

namespace App\Http\Controllers;


use App\Models\Suplier;
use App\Models\Type;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Konfirmation;
use App\Models\Checkout;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supliers       = Suplier::all();
        $types          = Type::all();
        $konfirmations  = Konfirmation::all();
        $products       = Product::all()->where('qty','>',0);
        $customers      = Customer::all();
        return view('admin.checkout', compact('konfirmations', 'products', 'customers', 'supliers', 'types'));
    }

    public function api(Request $request)
    {
        if ($request->status){
            $checkouts= Checkout::where('status', $request->status)->get();
        }else{
            $checkouts = Checkout::select('checkouts.id','date_start', 'status','customers.name as customer_id','product_id','konfirmations.qty')
                ->join('customers','customers.id','=', 'customer_id')
                ->join('konfirmations','konfirmations.checkout_id','=','checkouts.id')
                ->join('products','products.id','=','konfirmations.product_id')
                ->join('types','types.id','=','products.type_id')
                ->join('supliers','supliers.id','=','types.suplier_id')
                ->get();
        }

        foreach ($checkouts as $checkout)
        {
            if ($checkout->status == 1){
                $checkout->status ="Pending";
            }else{
                $checkout->status="Success";
            }
            $total_products=Konfirmation::selectRaw("SUM(qty) as totalProduct")
                ->where('checkout_id', $checkout->id)
                ->get();
            foreach ($total_products as $total_product) {
                $checkout->total_product = $total_product->totalProduct;
            }
            
            $total_prices=Konfirmation::selectRaw('SUM(products.price * konfirmations.qty) as totalPrice')
                ->join('products','products.id','=','product_id')
                ->where('checkout_id', $checkout->id)
                ->get();
                foreach ($total_prices as $total_price) {
                    $checkout->total_price = currency_IDR($total_price->totalPrice);
            }
        }
        
        $datatables = datatables()->of($checkouts)
                        ->addColumn('date1',function($checkout){
                            return convert_date($checkout->date_start);
                        })
                        ->addIndexColumn();
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
        $this->validate($request,[
            'customer_id'   => ['required'],
            'date_start'    => ['required'],
            'product_id'    => ['required'],
        ]);
        $checkout = new Checkout;
        $checkout->customer_id  = $request->customer_id;
        $checkout->date_start   = $request->date_start;
        $checkout->status=0;
        if ($checkout->save()){
            foreach ($request->product_id as $product_id) {
                Product::where("id", $product_id)->decrement("qty");
                Konfirmation::create(["checkout_id" => $checkout->id, "product_id" => $product_id, "qty"=>1]);
            }
        }
        return redirect('checkouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {

        $now = date('d M Y');
        $checkout->today = convert_date($now);
        $checkout->date_start= convert_date($checkout->date_start);
        $konfirmations=Konfirmation::select('product_id')
                ->where('checkout_id', $checkout->id)
                ->get();
            foreach ($konfirmations as $konfirmation) {
                $product2s = Product::select('name_product', 'price')
                    ->where('id', $konfirmation->product_id)
                    ->get();
                //$konfirmation->qty1= $konfirmations->qty;
                foreach($product2s as $product2){
                        //$konfirmation->qty1= $product2->qty;
                        $konfirmation->title= $product2->name_product;
                        $konfirmation->price1= currency_IDR($product2->price);
                    }
            }
        

        $total_prices=Konfirmation::selectRaw('SUM(products.price * konfirmations.qty) as totalPrice')
                ->join('products','products.id','=','product_id')
                ->where('checkout_id', $checkout->id)
                ->get();
                foreach ($total_prices as $total_price) {
                    $checkout->total_price = $total_price->totalPrice;
                    $tex = 0.1;
                    $checkout->textotal_price = $checkout->total_price * $tex;
                    $checkout->total = $checkout->total_price+$checkout->textotal_price;
                    $checkout->total_price1 = currency_IDR($checkout->total_price);
                    $checkout->textotal_price1 = currency_IDR($checkout->textotal_price);
                    $checkout->total1 = currency_IDR($checkout->total);
            }
        
        $customers  = Customer::select('name')
            ->where('id', $checkout->customer_id)
            ->get();
        return view ('admin.checkout.ditail', compact('checkout','customers','konfirmations'));
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        $this->validate($request,[
            'customer_id'   => ['required'],
            'date_start'    => ['required'],
            'status'        => ['required'],
            'product_id'    => ['required'],
        ]);

        $checkoutDB = new Checkout;

        $updatecheckout = $checkoutDB
            ->where('id', $checkout->id)
            ->update(['status'=>$request->status,
            'date_start'=>$request->date_start,
            'customer_id'=>$request->customer_id]);
        
        if($updatecheckout && $request->status == 0){
            foreach ($request->product_id as $product_id) {
                Product::where("id", $product_id)->increment("qty");
            }
        }
        
        return redirect('checkouts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        $konfirmation= new Konfirmation;
        $deletekonfirmation = $konfirmation
            ->where('checkout_id',$checkout->id)
            ->delete();
        
        if($deletekonfirmation){
            $checkout->delete();
        }

        return redirect('checkouts');
    }
}
