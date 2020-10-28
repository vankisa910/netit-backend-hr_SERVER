<?php

class Auth {
    
    private static $tableName = 'tb_auth_tokken';
    
    public static function createNewTokken($requestParameter) {
        
        $tokken = hash('sha256', $requestParameter['username'] . $requestParameter['password'] . uniqid());
        Database::insert(self::$tableName, array (
            'tokken' => $tokken
        ));
        return $tokken;
    }   
    
    public static function ifTokenExists($tokkenId) {
        
        $tokken = Database::select(self::$tableName)
                           ::where('tokken', $tokkenId)
                           ::build();
       
        return (count($tokken) == 1);
    }
}

