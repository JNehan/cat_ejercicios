<?php

    include_once __DIR__."/Booking.php";

    $FlagRsva = false; 
    $item     = [];
    if( isset( $_GET["rsva"] ) && !empty( $_GET["rsva"] ) ){
        $b  = new Booking();
        $rs = $b->getBooking( $_GET["rsva"] );

        if( $rs->status == 1){
            $FlagRsva = true; 
            $item = (object) $rs->msg; 
        }
    }
?>