<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use App\Models\Member;
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
        //Eloquent Member
        // $members = Member::all();

        // return $members;
        //--//

        //Eloquent member->user (hasOne)
        // $members = Member::with('user')->get();

        // return $members;
        //--//

        //Eloguent Author->Book (hasMany)
        // $author = Author::with('books')->get();

        // return $author;
        //--//


        // //Eloquent Book All
        // $books = Book::with('author', 'publisher', 'catalog')->get();

        // return $books;
        // //--//

        // //Eloguent catalog->Book (hasMany)
        // $catalog = Catalog::with('books')->get();

        // return $catalog;
        // //--//

        // //Eloguent publisher->Book (hasMany)
        // $publisher = Publisher::with('books')->get();

        // return $publisher;
        // //--//

        //Home Real
        return view('home');
    }
}
