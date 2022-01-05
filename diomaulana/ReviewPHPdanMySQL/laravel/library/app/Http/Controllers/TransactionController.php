<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.transaction.index');
    }

    public function api(Request $request)
    {
        // return notifMessage();
        if($request->gender && $request->date){
            
            $transactions = Transaction::select('transactions.id as transactionID', 'date_start', 'date_end', 'status', 'members.name', 'members.id as member_id')
                ->join('members', 'members.id', 'transactions.member_id')
                ->where('members.gender', $request->gender)
                ->where('transactions.date_start', $request->date)
                ->get();

        } elseif($request->gender){
            $transactions = Transaction::select('transactions.id as transactionID', 'date_start', 'date_end', 'status', 'members.name', 'members.id as member_id')
                ->join('members', 'members.id', 'transactions.member_id')
                ->where('members.gender', $request->gender)
                ->get();

        } elseif($request->date){
            $transactions = Transaction::select('transactions.id as transactionID', 'date_start', 'date_end', 'status', 'members.name', 'members.id as member_id')
                ->join('members', 'members.id', 'transactions.member_id')
                ->where('transactions.date_start', $request->date)
                ->get();

        } else {
            $transactions = Transaction::select('transactions.id as transactionID', 'date_start', 'date_end', 'status', 'members.name', 'members.id as member_id')
            ->join('members', 'members.id', 'transactions.member_id')
            ->get();
        }
         

        
        
        
        foreach($transactions as $transaction){
            if($transaction->status == 0){
                $transaction->status_book = 'Active';
                $transaction->badge = 'warning';
            } else {
                $transaction->status_book = 'Returned';
                $transaction->badge = 'success';
            }
            $transactionTotalBooks = TransactionDetail::selectRaw('SUM(qty) as total_book')
                ->where('transaction_id', $transaction->transactionID)
                ->get();
                foreach($transactionTotalBooks as $transactionTotalBook){
                    $transaction->totalBuku = $transactionTotalBook->total_book;
                }
            $transactionTotalPrices = TransactionDetail::selectRaw('SUM(price) as total_price')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->where('transaction_id', $transaction->transactionID)
                ->get();
                foreach($transactionTotalPrices as $transactionTotalPrice){
                    $transaction->totalPrice = format_IDR($transactionTotalPrice->total_price);
                }
            $transaction->tgl_pinjam = format_dated($transaction->date_start);
            $transaction->tgl_kembali = format_dated($transaction->date_end);
            $transaction->duration = diff_day($transaction->date_end, $transaction->date_start);    
            
        }
        $datatables = datatables()->of($transactions)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::select('title', 'id')
            ->where('qty', '>', 0)
            ->get();
        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
                'member_id' => ['required'],
                'date_start' => ['required'],
                'date_end' => ['required'],
                'book_id' => ['required']
        ]);
         $transaction = new Transaction;
         
         $transaction->member_id = $request->member_id;
         $transaction->date_start = $request->date_start;
         $transaction->date_end = $request->date_end;
         $transaction->status = 0;
         
        if($transaction->save()){
            foreach($request->book_id as $bookId){
                
                $bookDb = new Book;
                $bookCurs = Book::select('qty')
                    ->where('id', $bookId)
                    ->get();
                foreach($bookCurs as $bookCur){
                    $updateVal = $bookCur->qty;
                    $upVal = $updateVal - 1;
                }
                $bookDb->where('id', $bookId)->update(['qty' => $upVal]);

                $transactionDetail = new TransactionDetail;
                $transactionDetail->transaction_id = $transaction->id;
                $transactionDetail->book_id = $bookId;
                $transactionDetail->qty = 1;
                $transactionDetail->save();
             }
        }
         

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        // return $transaction;
        $member = Member::select('name')
                ->where('id', $transaction->member_id)
                ->get();
        $transactionDetails = TransactionDetail::select('book_id')
            ->where('transaction_id', $transaction->id)
            ->get();
        foreach($transactionDetails as $transactionDetail){
            $bookDBs = Book::select('title')
                ->where('id', $transactionDetail->book_id)
                ->get();
            
                foreach($bookDBs as $bookDb){
                    $transactionDetail->title = $bookDb->title;
                }
            
        }
        return view('admin.transaction.show', compact('transaction', 'transactionDetails', 'member'));
    }

    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        // return $transaction;
        $members = Member::all();
        $member = Member::select('name')
                ->where('id', $transaction->member_id)
                ->get();
        $books = Book::all();
        $transactionDetails = TransactionDetail::select('book_id')
            ->where('transaction_id', $transaction->id)
            ->get();
        return view('admin/transaction/edit', compact('transaction', 'member', 'members', 'books', 'transactionDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        
        $this->validate($request,[
                'member_id' => ['required'],
                'date_start' => ['required'],
                'date_end' => ['required'],
                'book_id' => ['required'],
                'status' => ['required'],
        ]);
        $transactionDb = new Transaction;

        $updateTrasaction = $transactionDb
            ->where('id', $transaction->id)
            ->update(
                ['status' => $request->status, 'date_start' => $request->date_start, 'date_end' => $request->date_end]
            );

        if($updateTrasaction && $request->status == 1){
            foreach($request->book_id as $bookId){
                
                $bookDb = new Book;
                $bookCurs = Book::select('qty')
                    ->where('id', $bookId)
                    ->get();
                foreach($bookCurs as $bookCur){
                    $updateVal = $bookCur->qty;
                    $upVal = $updateVal + 1;
                }
                $bookDb->where('id', $bookId)->update(['qty' => $upVal]);
            }
        }

        return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transactionDetailDb = new TransactionDetail;
        
        $deleteTransaction = $transactionDetailDb
            ->where('transaction_id', $transaction->id)
            ->delete();
        if($deleteTransaction){
            $transaction->delete();
        }
    }
}
