<?php
class validate{
    public static function validateEmail($email){
        $error="";
        if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)==false){
            $error="Sai email!";
            return $error;
        }
        return $error;
    }
}