<?php

namespace App\Http\Controllers;

use App\Book;
use App\Member;
use App\TransactionDitail;
use App\Transaction;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionditails = TransactionDitail::all();
        $members = Member::all();
        $books = Book::all();
        $transactions = Transaction::all();

        return view('admin.transaction.index',compact('transactions','books','members','transactionditails'));
    }

    public function api(Request $request)
    {

        //$transactions = Transaction::all();

        if ($request->status){
            $transactions=Transaction::where('status', $request->status)->get();
        } elseif ($request->date_start) {
            $transactions=Transaction::where('date_start', $request->date_start)->get();
        } else{
            $transactions = Transaction::all();
        }

        foreach($transactions as $transaction)
        {
            if ($transaction->status == 0){
                $transaction->status ="Has Been returned";
            }else{
                $transaction->status ="Not Been Restored";
            }

            $transaction->name2= $transaction->member->name;
            
            $total_books = TransactionDitail::selectRaw("SUM(qty) as totalbook")
                ->where('transaction_id', $transaction->id)
                ->get();
            foreach($total_books as $total_book){
                $transaction->total_book = $total_book->totalbook;
            }

            $total_prices = TransactionDitail::selectRaw("SUM(price * transaction_ditails.qty) as totalprice")
                ->join('books', 'books.id','=', 'book_id')
                ->where('transaction_id', $transaction->id)
                ->get();
            foreach($total_prices as $total_price){
                $transaction->total_price = currency_IDR($total_price->totalprice);
            }

            $startDate = date_create($transaction->date_start);
            $endDate = date_create($transaction->date_end);
            $total_days =date_diff($startDate,$endDate);
            $transaction->total_day=$total_days->days;
        }

        $datatables = datatables()->of($transactions)
        ->addColumn('date_start', function($transaction){
            return date_2($transaction->date_start);
        })->addColumn('date_end', function($transaction){
            return date_2($transaction->date_end);
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
        $members = Member::all();
        $books = Book::all()->where('qty','>',0);
        return view('admin.transaction.create',compact('members','books'));
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
            'member_id'     =>['required'],
            'date_start'    =>['required'],
            'date_end'      =>['required'],
            'book_id'       =>['required']

        ]);

        $transaction = new Transaction;

        $transaction->member_id = $request->member_id;
        $transaction->date_start = $request->date_start;
        $transaction->date_end = $request->date_end;
        $transaction->status = 0;
        //Transaction::create($request->all());

        if ($transaction->save()){
            foreach($request->book_id as $book_id){
                $bukunew = new Book;
                $bukus = Book::select('qty')
                    ->where('id', $book_id)
                    ->get();
                foreach($bukus as $buku){
                    $updatedbuku = $buku->qty;
                    $upbuku = $updatedbuku - 1;
                }
                $bukunew->where('id',$book_id)->update(['qty'=>$upbuku]);

                Book::where('id',$book_id)->decrement('qty');
                $transactionDitail = new TransactionDitail;
                $transactionDitail->transaction_id = $transaction->id;
                $transactionDitail->book_id = $book_id;
                $transactionDitail->qty = 1;
                $transactionDitail->save();
            }
        }
        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //$transactions = Transaction::all();
        $transactionditails = TransactionDitail::select('book_id')
            ->where('transaction_id', $transaction->id)
            ->get();
        foreach($transactionditails as $transactionditail){
            $bukus=Book::select('title')
                ->where('id',$transactionditail->book_id)
                ->get();

                foreach($bukus as $buku){
                    $transactionditail->title=$buku->title;
                }
        }
        $members = Member::select('name')
            ->where('id', $transaction->member_id)
            ->get();
        
        return view('admin.transaction.ditail',compact('transaction','members','transactionditails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //$transactions = Transaction::all();
        $transactionditails = TransactionDitail::select('book_id')
            ->where('transaction_id',$transaction->id)
            ->get();
        $members = Member::all();
        $books = Book::all();
        return view('admin.transaction.edit',compact('transaction','members','books','transactionditails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        foreach($request->book_id as $book_id){
            if ($request->status ==1){
                Book::where('id',$book_id)->increment('qty');
            } else{
                Book::where('id', $book_id)->decrement('qty');
            }
        }
        $transaction->update($request->all());

        TransactionDitail::where('transaction_id', $transaction->id)->delete();
        foreach($request->book_id as $book_id){
            Book::where('id',$book_id)->decrement('qty');
            TransactionDitail::insert([
                'transaction_id' => $transaction->id,
                'book_id'   =>intval($book_id),
                'qty'   =>1
            ]);
        }
        //if($request->status==1){
            //foreach($request->book_id as $book_id){
                //$newBook = new Book;
                //$newBooks2 = Book::select('qty')
                    //->where('id', $book_id)
                    //->get();
                //foreach($newBooks2 as $newBook2){
                    //$updatedbuku = $newBooks2->qty;
                    //$upBook = $updatedbuku +1;
                //}
                //$newBook->where('id', $book_id)->update(['qty'=>$upBook]);
                //TransactionDitail::where('transaction_id', $transaction->id)->delete();
                //foreach($request->book_id as $book_id){
                   //Book::where('id',$book_id)->decrement('qty');
                    //TransactionDitail::insert([
                        //'transaction_id' => $transaction->id,
                        //'book_id'   =>intval($book_id),
                        //'qty'   =>1]);
            //}
        //}
        

        return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transactionDitailnew= new TransactionDitail;

        $deleteTransaction = $transactionDitailnew
            ->where('transaction_id', $transaction->id)
            ->delete();
        if($deleteTransaction){
            $transaction->delete();
        }

        return redirect('transactions');
    }
}
