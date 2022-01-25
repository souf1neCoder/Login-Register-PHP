<?php
class Session{
    static public function setAlert($type,$msg){
        setcookie($type,$msg,time()+3);
    }
}