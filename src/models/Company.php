<?php

class Company {
    
    public static function getAll() {
        return Database::select('tm_company')
                       ::build();
    }
    
    public static function get($id) {
        
        return Database::select('tm_company')
                       ::where(array('id' => $id))
                       ::buildSingle();        
    }
}