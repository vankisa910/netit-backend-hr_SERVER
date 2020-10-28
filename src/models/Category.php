<?php

class Category {
    
    public static function getAll() {
        return Database::select('tm_category')::build();
    }
    
    public static function get($categoryId) {
        
        return Database::select('tm_category')
                       ::where(array('id' => $categoryId))
                       ::buildSingle();        
    }
}