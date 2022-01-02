<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        

        return view('admin.book', compact('publishers', 'authors', 'catalogs'));
    }
    public function api()
    {
        $books = Book::all();
        foreach ($books as $key => $book ){
            $book->date = format_date($book->created_at);
        }
        return json_encode($books);
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
                'isbn' => ['required', 'integer'],
                'title' => ['required'],
                'year' => ['required', 'integer'],
                'publisher_id' => ['required', 'integer'],
                'author_id' => ['required', 'integer'],
                'catalog_id' => ['required', 'integer'],
                'qty' => ['required', 'integer'],
                'price' => ['required', 'integer'],
        ]);

        Book::create($request->all());
        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
                'isbn' => ['required', 'integer'],
                'title' => ['required'],
                'year' => ['required', 'integer'],
                'publisher_id' => ['required', 'integer'],
                'author_id' => ['required', 'integer'],
                'catalog_id' => ['required', 'integer'],
                'qty' => ['required', 'integer'],
                'price' => ['required', 'integer'],
        ]);

        $book->update($request->all());
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect ('books');
    }
}
