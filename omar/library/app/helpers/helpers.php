<?php
use App\Models\Transaction;
    function convert_date($value){
        return date('H:i:s - d M Y', strtotime($value));
    };
    function convert_date2($value){
        return date('d M Y', strtotime($value));
    };

    function datediff($value){
        return round((strtotime($value->date_end) - strtotime($value->date_start)) / (60 * 60 * 24))." "."Hari";
    };

    function datediff2($value){
        return abs(round((strtotime(date('now')) - strtotime($value->date_start)) / (60 * 60 * 24) - 1))." "."Hari";
    }

    function rp($harga){
        $rupiah = "Rp".number_format($harga,'0', ',', '.');
        return $rupiah;
    };
    
    // function transaksi(){
    //     $transaksi = Transaction::with("member")->select("*" ,Transaction::raw("DATEDIFF(now(), date_start)AS Days"))->get();
    //     return $transaksi;
    // }
    // function unreturn(){
    //     $unreturn = $transaksi->where("status", 0)->where("Days", ">", 3);
    //     return $unreturn;
    // }

    // function jumlah(){
    //     $count = $unreturn->count();
    //     return $count;
    // }
    
    
    

?>