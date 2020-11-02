<?php

function getRequestActionMapping() {
    
    return array(
        'category' => 'category_manager',
        'company'  => 'company_manager'
    );
}

function getRequestEndpointMapping() {
    
    return array (
      
        array(
            'endpoint' => 'ad_post',
            'execute'  => 'get_ad_posts_all',
            'method'   => 'GET'
        ),
        
        array(
            'endpoint' => 'ad_post/{id}',
            'execute'  => 'get_ad_post_single',
            'method'   => 'GET'
        ),

        array(
            'endpoint' => 'ad_post/category/{category_id}',
            'execute'  => 'get_ad_posts_by_category',
            'method'   => 'GET'
        ),        

        array(
            'endpoint' => 'category',
            'execute'  => 'get_category_all',
            'method'   => 'GET'
        ),    
        
        array(
            'endpoint' => 'category/{id}',
            'execute'  => 'get_category_single',
            'method'   => 'GET'
        ),
        
        array(
            'endpoint' => 'ad_post/company/{company_id}',
            'execute'  => 'get_ad_posts_by_company',
            'method'   => 'GET'
        ),        

        array(
            'endpoint' => 'company',
            'execute'  => 'get_company_all',
            'method'   => 'GET'
        ),    
        
        array(
            'endpoint' => 'company/{id}',
            'execute'  => 'get_company_single',
            'method'   => 'GET'
        ),
        
        array(
            'endpoint' => 'user/signin',
            'execute'  => 'signin_user',
            'method'   => 'POST'
        ),

        array(
            'endpoint' => 'user/signup',
            'execute'  => 'signup_user',
            'method'   => 'POST'
        )       
    );
}

