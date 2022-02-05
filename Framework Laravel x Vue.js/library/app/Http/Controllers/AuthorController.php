<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        $authors = Author::all();

        return view('admin.author', compact('authors'));
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
        $messages = [
            'required' => ':attribute cannot be empty',
            'min' => ':attribute must be at least :min characters',
            'max' => ':attribute cannot be more than :max characters',
            'numeric' => ':attribute must be number'
        ];

        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required'
        ], $messages);

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
        $messages = [
            'required' => ':attribute cannot be empty',
            'min' => ':attribute must be at least :min characters',
            'max' => ':attribute cannot be more than :max characters',
            'numeric' => ':attribute must be number'
        ];

        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required'
        ], $messages);

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
