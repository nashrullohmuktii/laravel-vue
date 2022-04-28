<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        $supliers=Suplier::all();

        return view('admin.type', compact('supliers'));
    }

    public function api()
    {
        $type = Type::select('types.id', 'types.name', 'code', 'supliers.name as suplier_id')
            ->join('supliers', 'supliers.id', '=','suplier_id')
            ->get();
        
        $datatables = datatables()->of($type)->addIndexColumn();

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
        //return $request;
        $this->validate($request,[
            'name'          =>['required'],
            'code'         =>['required'],
            'suplier_id'          =>['required'],
        ]);

        Type::create($request->all());
        return redirect('types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request,[
            'name'          =>['required'],
            'code'         =>['required'],
            'suplier_id'          =>['required'],
        ]);


        $type->update($request->all());
        return redirect('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
    }
}
