<?php



    function format_date($data){
        return date('d M Y, H:i:s', strtotime($data));
    }
    function format_dated($data){
        return date('d M Y', strtotime($data));
    }
    function diff_day($a,$b){
        $akhir = new DateTime($b);
        $awal = new DateTime($a);
        $z = date_diff($akhir, $awal);
        return $z->days;
    }

    function format_IDR ($data){
        return 'Rp '.number_format($data,0,',','.').' ,-';
    }
    function countNotif(){
        $now = strtotime(date("Y-m-d"));
        $q = DB::select("select * FROM transactions WHERE UNIX_TIMESTAMP(date_end) < '$now' AND status = 0");
        return count($q);
    }
    function notifMessage(){
        $now = strtotime(date("Y-m-d"));
        $nows = date("Y-m-d");
        $q = DB::select("select members.name, date_end FROM transactions join members ON members.id=transactions.member_id WHERE UNIX_TIMESTAMP(date_end) < '$now' AND status = 0");
        foreach($q as $a){
            $z = diff_day($nows, $a->date_end);
            $a->diffDay = $z;
        }
        return $q;
    }
   
?>