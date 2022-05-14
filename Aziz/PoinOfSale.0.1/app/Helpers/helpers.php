<?php

use App\Models\Checkout;

    function convert_date($value){
        return date('d M Y', strtotime($value));
    }

    if (!function_exists('currency_IDR')){
        function currency_IDR($value){
            return "Rp. " . number_format($value,0, ',' , '.');
        }
    }

    function totalnotif(){
        $checkouts= Checkout::select('checkouts.id', 'checkouts.date_start', 'checkouts.status')
            ->where('status','=',1)
            ->get();
        return count($checkouts);
    }

    function messagenotif(){
        $checkouts = Checkout::select('checkouts.id', 'checkouts.date_start', 'customers.name')
            ->join('customers', 'customers.id','=', 'customer_id')
            ->where('status','=',1)
            ->get();
        return($checkouts);
    }
    


?>