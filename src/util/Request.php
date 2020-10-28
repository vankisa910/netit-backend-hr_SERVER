<?php

class Request {
    
    public static function jsonStream() {
         
       $jsonObject = file_get_contents("php://input");
       return json_decode($jsonObject);
    }
    
    public static function authTokken() {
        
       return isset(apache_request_headers()['verify-tokken']) ? apache_request_headers()['verify-tokken'] : null ;
    }
}