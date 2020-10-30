<?php

function get_category_all() {
    
    $categoryCollection = Category::getAll();
    return Response::ok(array('data' => $categoryCollection));
}

function get_category_single($id) {
    
    $categorySingle = Category::get($id);
    return Response::ok(array('data' => $categorySingle));
}