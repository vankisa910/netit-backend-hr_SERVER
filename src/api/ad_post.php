<?php

function get_ad_posts_all() {
    
    $adPostsCollection = AdPost::getAll();
    return Response::ok(array('data' => $adPostsCollection));
}

function get_ad_post_single($id) {
    
    $adPostSingle = AdPost::get($id);
    
    if(is_null($adPostSingle)) {
        return Response::notFound(array('message' => 'No data found!'));
    }
    return Response::ok(array('data' => $adPostSingle));
}

function get_ad_posts_by_category($categoryId) {
    
    $adPostsCollection = AdPost::getByCategory($categoryId);
    return Response::ok(array('data' => $adPostsCollection));
}

function get_ad_posts_by_company($companyId) {
    
    $adPostsCollection = AdPost::getByCompany($companyId);
    return Response::ok(array('data' => $adPostsCollection));
}