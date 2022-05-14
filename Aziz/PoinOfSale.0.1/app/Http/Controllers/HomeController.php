<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\User;
use App\Models\Customer;
use App\Models\Basket;
use App\Models\Checkout;
use App\Models\Konfirmation;
use App\Models\Product;
use App\Models\Type;
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
        $total_suplier  = Suplier::count();
        $total_type     = Type::count();
        $total_customer = Customer::count();
        $total_prduct   = Product::count();


        

        //Bar Chart Products
        $label_bar = Product::orderBy('products.id', 'asc')->groupBy('name_product')->pluck('name_product');
        $dataqty_bar = Product::orderBy('products.id', 'asc')->groupBy('qty')->pluck('qty');
        //$dataprice_bar = Product::orderBy('products.id', 'asc')->groupBy('price')->pluck('price');


        //return $datatables;

        return view('home', compact('total_suplier', 'total_type', 'total_customer', 'total_prduct','label_bar','dataqty_bar'));
        
    }
}
