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
        //$now = new DateTime('now');
        $checkouts= Checkout::select('checkouts.id', 'checkouts.date_start')
            //->where('date_start','<=', $now)
            ->where('status','=',0)
            ->get();
        
        return count($checkouts);
    }
    


?>