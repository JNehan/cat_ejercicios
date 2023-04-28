<?php

    class Validate {

        public function validateNumber( $number ){
           return is_numeric( intval($number,10) );
        }

        public function validateEmail( $email ){
           return filter_var( $email , FILTER_VALIDATE_EMAIL);
        }

        public function sanitazeEmail( $email ){
            return filter_var( $email , FILTER_SANITIZE_EMAIL);
        }

        public function sanitazeNumberInt( $number ){
            return filter_var( $number , FILTER_SANITIZE_NUMBER_INT);
        }

        public function sanitazeStr( $str ){
            return filter_var( $str , FILTER_SANITIZE_STRING);
        }

        function validateDateWithFormat($date, $format = 'd-m-Y')
        {
            $d = DateTime::createFromFormat($format, $date);
            $errors = DateTime::getLastErrors();
            
            return $d && empty($errors['warning_count']) && $d->format($format) == $date;       
        }

    }

?>