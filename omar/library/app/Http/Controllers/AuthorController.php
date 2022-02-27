<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();
        
        // $authors = Author::with('books')->get();

        // return view('admin.author', compact('authors'));
        return view('admin.author', compact('transaksi', 'unreturn', 'count'));
    }

    // API
    public function api()
    {
        $authors = Author::all();

        // foreach ($authors as $key => $author) {
        //     $author->date = convert_date($author->created_at);
        // };
        
        $datatables = datatables()->of($authors)
                                ->addColumn('date', function($author){
                                    return convert_date($author->created_at);
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
            'name' => ['required'],
            'email' => ['required', 'unique:authors'],
            'phone_number' => ['required', 'min:8', 'max:15'],
            'address' => ['required']
        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required', 'min:8', 'max:15'],
            'address' => ['required']
        ]);

        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
