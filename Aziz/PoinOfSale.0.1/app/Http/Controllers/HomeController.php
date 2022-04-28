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


        return view('home', compact('total_suplier', 'total_type', 'total_customer', 'total_prduct'));
    }
}
