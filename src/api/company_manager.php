<?php

function get_company_all() {
    
    $companyCollection = Company::getAll();
    return Response::ok(array('data' => $companyCollection));
}

function get_company_single($id) {
    
    $companySingle = Company::get($id);
    return Response::ok(array('data' => $companySingle));
}