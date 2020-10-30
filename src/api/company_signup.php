<?php

function signup_company() {
    
    $streemObject = Request::jsonStreem();
    
    $companyRequest = array(
        'title'      => $streemObject->title,
        'country'      => $streemObject->country, 
        'website'      => $streemObject->website,
        'phone'      => $streemObject->phone,
        'address'      => $streemObject->address,
        'aboutus'      => $streemObject->aboutus,
    );
    
    if(CompanySignUp::companyExists($companyRequest)) {
        
       return Response::error(array(
           'message' => 'This company is already registered!'
       ));
    }
    
    if(CompanySignUp::newSignUp($companyRequest)) {
        
       return Response::ok(array(
           'message' => 'You have registered successfully!'
       ));
    }
    
    return Response::error(array(
        'message' => 'Something whent wrong!'
    ));    
}