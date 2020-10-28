<?php

class Router {
    private static $isitAuthenticated     = false;
    private static $placeholderCollection = array();

    public static function bootstrap() {

        $requestUrlPathInfo          = isset($_SERVER['REDIRECT URL'])? $_SERVER['REDIRECT URL'] : '/' ;
        $requestMethod               = $_SERVER['REQUEST METHOD']; 
        $requestActionFileCollection = explode('/', $requestUrlPathInfo);
        
        array_shift($requestActionFileCollection);
        array_shift($requestActionFileCollection);
        
        $requestAction       = $requestActionFileCollection[0];
        $requestActionFile   = self::requestActionMapping($requestAction);
        
        include './src/api/' . $requestActionFile . 'php';
        
        $functionExecutor = self::requestEndpointMapping($requestActionFileCollection, $requestMethod);
        
        if(is_null($functionExecutor)) {
            return Response::notFound(array('message' => 'No such mapping found!'));
        }
        
        $notAuthenticatedUser = self::$isitAuthenticated && 
                                self::isForbidden();
        
        if($notAuthenticatedUser) {
            return Response::forbidden() ;
        }
        
        call_user_func_array($functionExecutor, self::placeholderValueCollection());
    }
         
   private static function requestActionMapping($requestAction) {
        
        $requestActionMapping = getRequestActionMapping();
        return (array_key_exists($requestAction, $requestActionMapping)) ? $requestActionMapping($requestAction) : $requestAction;
    }
    
   private static function requestEndpointMapping($requestEndpoint, $requestMethod) {
       
       $requestEndpointMapping = getRequestEndpointMapping();
       
       foreach($requestEndpointMapping as $endpointCollection) {
           
           $endpoint = explode('/', $endpointCollection['endpoint']);
           $method   = $endpointCollection['method'];
           $execute  = $endpointCollection['execute'];
           
           $isValid  = Router::validateEndpointCollectionCount($endpoint, $requestEndpoint)   &&
                       Router::validateEndpointCollectionElement($endpoint, $requestEndpoint) &&
                       Router::validateEndpointCollectionMethod($method, $requestMethod);
           
           if($isValid){
               self::$isitAuthenticated = self::Authenticated($endpointCollection);
               return $execute;
           }
       }
       
       return null;
   }
   
   private static function validateEndpointCollectionCount($endpointCollection, $requestEndpointCollection) {
       return count($endpointCollection) == count($requestEndpointCollection);
   }
   
   private static function validateEndpointCollectionElement($endpointCollection, $requestEndpointCollection) {
       
       for($i = 0; $i < count($endpointCollection); $i++) {
           
           $endpointElement        = $endpointCollection[$i];
           $requestEndpointElement = $requestEndpointCollection[$i];
           
           if(self::optionalPlaceholder($endpointElement)) {
               self::addPlaceholderValue($requestEndpointElement);
           }
           else if($endpointElement != $requestEndpointElement) {
               return false;
           }
       }
       return true;
   }
   
   private static function validateEndpointCollectionMethod($method, $requestMethod) {
       return $method == $requestMethod;
   }
   
   private static function Authenticated($endpointCollection) {
       isset($endpointCollection['auth'])? $endpointCollection['auth'] : false;
   }
   
   private static function Placeholder($placeholder, $leftTerminal, $rightTerminal) {
       
       $placeholderLength = strlen($placeholder); 
       $startPosition     = strpos($placeholder, $leftTerminal);
       $endPosition       = strpos($placeholder, $rightTerminal);
       
       return (($startPosition == 0) &&
              ($endPosition   == ($placeholderLength - 1)));
   }
   
   private static function optionalPlaceholder($placeholder) {
       return self::Placeholder($placeholder, '{', '}');
   }
   
   private static function requiredPlaceholder($placeholder) {
       return self::Placeholder($placeholder, '[', ']');
   }   
   
   private static function addPlaceholderValue($placeholderValue) {
       array_push(self::$placeholderCollection, $placeholderValue);
   }
   
   private static function placeholderValueCollection() {
       return self::$placeholderCollection;
   }
   
   private static function isForbidden() {
       return !Auth::ifTokenExists(Request::authTokken());
   }
}
