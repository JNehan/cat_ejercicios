<?php

    class DB {

        private $host = "localhost";
        private $dbname = "web_fs_3";
        private $user = "root";
        private $pass = "";

        public function getConn(){
            return new PDO("mysql:host=$this->host;dbname=$this->dbname;", $this->user, $this->pass );
        }

    }

?>