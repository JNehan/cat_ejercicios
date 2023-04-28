<?php

    include_once "./Prices.php";
    
    $rs = (object) [
        "status"=>0,
        "price" =>"-",
    ];

    $data = json_decode(file_get_contents('php://input'));
    if( isset($data->ServiceDestination) && isset($data->ServiceType)  ){
       
        $price = new Prices();
        $rs = $price->getPrice( $data->ServiceDestination, $data->ServiceType );
       
    }
    
    echo json_encode( $rs );
    exit;
?>