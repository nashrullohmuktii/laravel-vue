<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        //$customers=Customer::all();
        //return $customers;
        //return view('admin.customer', compact('customers'));
        return view('admin.customer');
    }

    public function api(Request $request)
    {
        //$customers=Customer::all();
        if ($request->gender){
            $datas = Customer::where('gender', $request->gender)->get();
        } else{
            $datas = Customer::all();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        return $datatables->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.customer.create');
        //return view('admin.customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        //untuk melihat data sudah masuk apa belum

        $this->validate($request,[
            'name'          =>['required'],
            'gender'        =>['required'],
            'phone_number'  =>['required'],
            'address'      =>['required'],
            'email'         =>['required'],
        ]);
        //untuk menvalidasi jika tidak ada data inputan yang kosong
        Customer::create($request->all());

        return redirect('customers');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request,[
            'name'          =>['required'],
            'gender'        =>['required'],
            'phone_number'  =>['required'],
            'address'      =>['required'],
            'email'         =>['required'],
        ]);
        
        $customer->update($request->all());

        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }
}
