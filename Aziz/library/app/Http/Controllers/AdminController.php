<?php

namespace App\Http\Controllers;

use DB;
use App\Admin;
use App\Author;
use App\Book;
use App\Catalog;
use App\Dashboard;
use App\Member;
use App\Publisher;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    public function dashboard(){
        $total_member = Member::count();
        $total_book = Book::count();
        $total_author = Author::whereMonth('date_author',date('m'))->count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id)as total"))->groupBy('publisher_id','asc')->pluck('total');
        $label_donut = Publisher::orderBy('publisher_id','asc')->join('book','book.publisher_id','=','publisher_id')->groupBy('name')->pluck('name');

        $label_bar = ['Author'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label']=$label_bar[$key];
            $data_bar[$key]['backgroundColor']= 'rgba(60,141,188,0.9)';

            foreach(range(1,12)as $month){
                $data_month[]=Author::select(DB::raw("COUNT(*) as total"))->whereMonth('date_author',$month)->first()->total;
            }
            $data_bar[$key]['data']=$data_month;
        }
        return view('admin.dashbord',compact('total_book','total_member','total_author','total_publisher'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
