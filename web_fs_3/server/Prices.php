<?php

    class Prices {

        private function getPricesList(){

                return [
                    "ISL"=>[
                        "PRIV"=>45,
                        "LUJO"=>75,
                    ],
                    "COZ"=>[
                        "PRIV"=>80,
                        "LUJO"=>120,
                    ],
                    "HOL"=>[
                        "PRIV"=>130,
                        "LUJO"=>200,
                    ],
                ];

        }

        public function getPrice( $dest, $serv ){
            $PriceList = $this->getPricesList();

            $price = "-";
            $status=0;
            if( isset($PriceList[ $dest ]) ){

                if( isset($PriceList[ $dest ][ $serv ]) ){
                    $price = $PriceList[ $dest ][ $serv ];
                    $status=1;
                }

            }

            return (object) [
                "status"=>$status,
                "price" =>$price,
            ];

        }


    }

?>