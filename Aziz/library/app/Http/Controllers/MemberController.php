<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
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
    public function index(Request $request)
    {
        
        return view('admin.member');
    }

    public function api(Request $request)
    {
        //$members = Member::all();
        
        if ($request->gender){
            $datas = Member::where('gender', $request->gender)->get();
        } else {
            $datas = Member::all();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();


        
        //$datatables = datatables()->of($members)->addColumn('date', function($member){
            //return convert_date($member->created_at);
        //})->addColumn('date2', function($member){
            //return convert_date($member->updated_at);
        //})->addIndexColumn();

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
            'name'          =>['required'],
            'gender'        =>['required'],
            'phone_number'  =>['required'],
            'address'       =>['required'],
        ]);

        Member::create($request->all());
        return redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        
        $this->validate($request,[
            'name'          =>['required'],
            'gender'        =>['required'],
            'phone_number'  =>['required'],
            'address'       =>['required'],
        ]);
        $member->update($request->all());

        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
    }
}
