<?php

class Response {
    
    public static function error($responseInputCollection = array()) {
        self::send($responseInputCollection, '400');
    }
    
    public static function ok($responseInputCollection = array()) {
        self::send($responseInputCollection, '200');
    }
    
    public static function notFound($responseInputCollection = array()) {
        self::send($responseInputCollection, '404');
    }
    
    public static function forbidden($responseInputCollection = array()) {
        self::send($responseInputCollection, '403');
    }
    
    private static function send($responseInputCollection, $statusCode) {
        
        $responseObject = array('status' => $statusCode);
        
        if(isset($responseInputCollection['message'])) {
            $responseObject['message'] = $responseInputCollection['message'];
        }
        
        if(isset($responseInputCollection['data'])) {
            $responseObject['data'] = $responseInputCollection['data'];
        }
        
        header('Content-type:application/json');
        echo json_encode($responseObject);
    }
}