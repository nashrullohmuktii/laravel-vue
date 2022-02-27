<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\models\Book;
use App\models\TransactionDetail;
use App\models\Member;
use App\Models\Transaction;
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
    
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();

        $transaction_details = TransactionDetail::all();
        $members = Member::all();
        $books = Book::all();
        return view('admin.transaction.index', compact('transaction_details', 'members','books', 'transaksi', 'unreturn', 'count'));
    }

    Public function api(Request $request){
              
        $transactions = Transaction::with("transactionDetails.book", "member"); 
        if ($request->status){
            switch ($request->status) {
                case "sudah":
                    $transactions = $transactions->where("status", true);
                    break;
                case "belum":
                    $transactions = $transactions->where("status", false);
                    break;
            }
        }

        if($request->date_start){
            $transactions = $transactions->whereDate("date_start", date($request->date_start));
        }

        

        $datatables = datatables()->of($transactions)
                                    ->addColumn('status2', function($transaction){
                                        if ($transaction->status == 0) {
                                            return 'Belum Dikembalikan';
                                        } elseif ($transaction->status == 1) {
                                            return 'Sudah Dikembalikan';
                                        }
                                    })
                                    ->addColumn('date_start', function($transaction){
                                        return convert_date2($transaction->date_start);
                                    })
                                    ->addColumn('date_end', function($transaction){
                                        if ($transaction->date_end == NULL) {
                                            return "-";
                                        } else{
                                            return convert_date2($transaction->date_end);
                                        }                                        
                                    })
                                    ->addColumn('long', function ($transaction){
                                        if ($transaction->status == 0){
                                            return datediff2($transaction);
                                        } else {
                                            return datediff($transaction);
                                        }
                                        
                                    })   
                                    ->addColumn('name', function($transaction){
                                        return $transaction->member->name;
                                    })                                 
                                    ->addColumn('total_book', function($transaction){
                                        return ($transaction->transactionDetails->sum('qty'));
                                    })
                                    ->addColumn('total_price', function($transaction){
                                        $total_price = 0;
                                        foreach ($transaction->transactionDetails as $key => $detail) {
                                            $total_price = $total_price + ($detail->qty * $detail->book->price);
                                        }
                                        return rp($total_price);
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
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();
        

        $transaction_details = TransactionDetail::all();
        $members = Member::all();
        $books = Book::all()->where('qty', '>', '0');
        return view('admin.transaction.create', compact('transaction_details', 'books', 'members', 'transaksi', 'unreturn', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,[
                'member_id' => ['required'],
                'date_start' => ['required'],
            ]);
            
            $transactions = Transaction::create($request->toArray());
            foreach ($request->book_id as $book_id) {
                $transactions->transactionDetails()->create([
                    "book_id" => intval($book_id),
                    "qty" => 1
                ]);
            }
            
            $bukus = new Book;
            foreach ($request->book_id as $key => $book_id) {
                $bukus->where('id', $book_id)->decrement('qty');
            }

            return redirect('transactions');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();

        $transaction_details = TransactionDetail::all();
        $members = Member::all();
        $member = $transaction->member_id;
        $books = Book::all();
        $detail = $transaction->transactionDetails;
        foreach ($detail as $key => $value) {            
            $bukus[] = $value->book_id;        
        } 
        return view('admin.transaction.detail', compact('transaction','transaction_details','members', 'books', 'bukus', 'member', 'transaksi', 'unreturn', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
        $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
        $count = $unreturn->count();

        $transaction_details = TransactionDetail::all();
        $detail = $transaction->transactionDetails;
        foreach ($detail as $key => $value) {            
            $bukus[] = $value->book_id;        
        } 
        $members = Member::all();
        $books = Book::all();
        return view('admin.transaction.edit', compact('transaction', 'transaction_details', 'members','books', 'bukus', 'transaksi', 'unreturn', 'count'));
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

        if ($request->status == 0) {
            $this->validate($request,[
                'member_id' => ['required'],
                'date_start' => ['required'],  
            ]);

            $transactions = $transaction->update($request->all());

            foreach ($transaction->transactionDetails as $detail) {
                $book_id = $detail->book_id;         
                Book::where("id", $book_id)->increment("qty");        
            }
            

            $transaction->transactionDetails()->delete();

            foreach ($request->book_id as $book_id) {
                $transaction->transactionDetails()->create([
                    "book_id" => intval($book_id),
                    "qty" => 1
                ]);            
                Book::where("id", $book_id)->decrement("qty");
            }
            
        } else {
            $this->validate($request,[
                'member_id' => ['required'],
                'date_start' => ['required'],
                'date_end' => ['required']   
            ]);

            $transactions = $transaction->update($request->all());
            $transaction->transactionDetails()->delete();
        
            foreach ($request->book_id as $book_id) {
                $transaction->transactionDetails()->create([
                    "book_id" => intval($book_id),
                    "qty" => 1
                ]);            
                Book::where("id", $book_id)->increment("qty");
            }
        };

        
        
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
        foreach ($transaction->transactionDetails as $detail) {
            $book_id = $detail->book_id;         
            Book::where("id", $book_id)->increment("qty");        
        }
        $transaction->transactionDetails()->delete();
        $transaction->delete();
    }
}
