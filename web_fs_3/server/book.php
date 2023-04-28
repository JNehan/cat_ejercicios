<?php

    include_once "./Validate.php";
    include_once "./Prices.php";
    include_once "./Booking.php";

    $rs = (object) [
        "status"=>0,
        "msg" =>"No se pudo guardar la informacion.",
    ];

    $validate = new Validate();

    $data = json_decode(file_get_contents('php://input'));

    $ServiceDestination = ( isset($data->ServiceDestination) ? ( !empty($data->ServiceDestination) ? $validate->sanitazeStr( $data->ServiceDestination ) :"" ) : "");
    $ServiceSchedule = ( isset($data->ServiceSchedule) ? ( $validate->validateDateWithFormat( $data->ServiceSchedule, "H:i" ) ? $data->ServiceSchedule :"" ) : "");
    $ServiceType = ( isset($data->ServiceType) ? ( !empty($data->ServiceType) ? $validate->sanitazeStr( $data->ServiceType ) :"" ) : "");
    $InName = ( isset($data->InName) ? ( !empty($data->InName) ? $validate->sanitazeStr( $data->InName ) :"" ) : "");
    $InEmail = ( isset($data->InEmail) ? ( $validate->validateEmail($data->InEmail) ? $validate->sanitazeEmail( $data->InEmail ) :"" ) : "");
    $InPhone = ( isset($data->InPhone) ? ( $validate->validateNumber($data->InPhone) ? $validate->sanitazeNumberInt( $data->InPhone ) :"" ) : "");

    if( 
        !empty($ServiceDestination) &&
        !empty($ServiceSchedule) &&
        !empty($ServiceType) &&
        !empty($InName) &&
        !empty($InEmail) &&
        !empty($InPhone)  
    ){
       
        $price = new Prices();
        $rs = $price->getPrice( $ServiceDestination, $ServiceType );

        $save = (object) [
            "Name"=>$InName,
            "Email"=>$InEmail,
            "Phone"=>$InPhone,
            "Destination"=>$ServiceDestination,
            "Schedule"=>$ServiceSchedule,
            "ServiceType"=>$ServiceType,
            "Total"=> $rs->price ,
        ];

        $booking = new Booking();
        $rs = $booking->saveBook( $save );

        // $rs = $booking->getBooking( $rs->msg );
        
    }

    echo json_encode( $rs );
    exit;
?>