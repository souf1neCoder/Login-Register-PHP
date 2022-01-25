<?php

class DB{
     public static function connecte(){
        $db = new PDO("mysql:host=localhost;dbname=login-register","root","");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
    
}
