<?php
use App\Transaction;

    function convert_date($value){
        return date('H: i: s - d M Y', strtotime($value));
    }
    function date_2($value){
        return date('d M Y', strtotime($value));
    }
    
    if (!function_exists('currency_IDR')){
        function currency_IDR($value){
            return "Rp. " . number_format($value,0, ',' , '.');
        }
    }

    function totalnotif(){
        $now = new DateTime('now');
        $transactions= Transaction::select('transactions.id', 'transactions.date_end')
            ->where('date_end','<=', $now)
            ->where('status','=',0)
            ->get();
        
        return count($transactions);
    }
    function messagenotif(){
        $now = new DateTime('now');
        $transactions = Transaction::select('transactions.id', 'transactions.date_end', 'members.name')
            ->join('members', 'members.id', '=', 'member_id')
            ->where('date_end', '<=', $now)
            ->where('status', '=', 0)
            ->get();
        foreach($transactions as $transaction){
            $now = new DateTime('now');
            $endDate = new DateTime($transaction->date_end);
            $transaction->total_day = ($now->diff($endDate)->days);
            if ($transaction->total_day == 0){
                $transaction->total_day = "Last Day";
            }else{
                $transaction->total_day = "Last $transaction->total_day Day";
            }
        }
        return($transactions);
    }
?>