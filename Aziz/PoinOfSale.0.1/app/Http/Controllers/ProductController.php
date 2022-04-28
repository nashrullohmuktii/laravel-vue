<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.product', compact('types'));
    }

    public function api()
    {
        $product = Product::select('products.id', 'products.name_product', 'qty', 'price','types.name as type_id')
            ->join('types', 'types.id', '=','type_id')
            ->get();
        
        //return $product;
        $datatables = datatables()->of($product)
                        ->addColumn('price', function($product){
                            return currency_IDR($product->price);
                        })->addIndexColumn();

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
            'name_product'  => ['required'],
            'type_id'       => ['required'],
            'price'         => ['required'],
            'qty'           =>['required'],
        ]);

        Product::created($request->all());
        //return dd($request);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name_product'  => ['required'],
            'type_id'       => ['required'],
            'price'         => ['required'],
            'qty'           =>['required'],
        ]);

        $product->update($request->all());
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
