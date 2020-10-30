<?php

class CompanySignUp {
    
    private static $table = 'tm_company';
    
    public static function companyExists($parameterCollection) {
        
        $collection = Database::select(self::$table)
                ::where('title', $parameterCollection['title'])
                ::orWhere('website', $parameterCollection['website'])                
                ::build();
        
        return (count($collection) > 0);
    }
    
    public static function newSignUp($parameterCollection) {
        
        Database::insert(self::$table, $parameterCollection);
    }
}    