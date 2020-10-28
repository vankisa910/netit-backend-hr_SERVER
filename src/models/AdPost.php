<?php

class AdPost {
    
    public static function getAll() {
        return Database::select('tb_ad_post')::build();
    }
    
    public static function get($id) {
        
        return Database::select('tb_ad_post')
                       ::where(array('id' => $id))
                       ::buildSingle();
    }
    
    public static function getByCategory($categoryId) {
        
        return Database::getAll("SELECT * FROM  tb_ad_post a,
                                                tb_ad_post__category b
                                          WHERE a.id = b.post_id AND 
                                                b.category_id = $categoryId");
    }
    
    public static function getByCompany($companyId) {
        
        return Database::getAll("SELECT * FROM  tb_ad_post a,
                                                tb_ad_post__company b
                                          WHERE a.id = b.post_id AND 
                                                b.company_id = $companyId");
    }
}