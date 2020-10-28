<?php

function signup_user() {
    
    $streamObject = Request::jsonStream();
    
    $userRequest = array(
        'fname'   => $streamObject->fname,
        'lname'   => $streamObject->lname,
        'city'    => $streamObject->city,
        'country' => $streamObject->country,
        'name'    => $streamObject->username,
        'pass'    => hash('sha256',$streamObject->password),
        'email'   => $streamObject->email,
        'phone'   => $streamObject->phone
    );
    
    if(User::userExists($userRequest)){
       
        return Response::error(array(
            'message' => 'This username or email already exists!'
        ));
    }
    
    if(User::newSignUp($userRequest)) {
        
        return Response::ok(array(
            'message' => 'You have registered successfully!'
        ));
    }
    
    return Response::error(array(
        'message' => 'Something went wrong,please try again!'
    ));
}

function signin_user() {
    
    $streamObject = Request::jsonStream();
    
    $userRequest = array(
        
        'name'    => $streamObject->username,
        'pass'    => hash('sha256',$streamObject->password)
    );
    
    $userRecord = User::signIn($userRequest);
    
    if($userRecord) {
        
        $tokken = Auth::createNewTokken($userRequest);
                 
        return Response::ok(array(
            
           'data' => array(
              'tokken' => $tokken
           ),
            
           'message' => 'You signed in successfully!' 
        ));
    }    
        
    return Response::notFound(array(
        'message' => 'The user does not exist!'
    ));
}
























