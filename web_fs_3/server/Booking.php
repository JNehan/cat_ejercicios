<?php

    include_once __DIR__."/DB.php";

    class Booking extends DB{

        public function saveBook( $data ){
           
            try {
                $dbh = $this->getConn();
                $rs = $dbh->query("CALL save_book('$data->Name','$data->Email','$data->Phone','$data->Destination','$data->Schedule','$data->ServiceType','$data->Total')");
                $id = $rs->fetch(PDO::FETCH_BOTH)[0];

                $status = 1;
                $msg = $id;
                $dbh = null;
            } catch (PDOException $e) {
                $status = 0;
                $msg = "Error al intentar guardar la informacion.";
            }

            return (object) [
                "status"=>$status,
                "msg"=>$msg,
            ];

        }

        public function getBooking( $id ){
            try {
                $dbh = $this->getConn();
                $dt  = $dbh->query("SELECT * FROM reservation AS r WHERE r.id = '$id';");
                $status = 1;
                $msg = $dt->fetch(PDO::FETCH_ASSOC);
                $dbh = null;
            } catch (PDOException $e) {
                $status = 0;
                $msg = "Error al intentar guardar la informacion.";
            }

            return (object) [
                "status"=>$status,
                "msg"=>$msg,
            ];
        }

    }

?>