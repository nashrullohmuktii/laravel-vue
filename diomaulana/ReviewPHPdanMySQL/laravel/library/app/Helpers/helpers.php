<?php

    function format_date($data){
        return date('d M Y, H:i:s', strtotime($data));
    }

?>