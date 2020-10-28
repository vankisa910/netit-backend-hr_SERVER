<?php

function get_category_all() {
    
    $categoryCollection = Category::getAll();
    return Response::ok(array('data' => $categoryCollection));
}

function get_category_single($categoryId) {
    
    $categorySingle = Category::get($categoryId);
    return Response::ok(array('data' => $categorySingle));
}