<?php

class User {
    
    private static $table      = 'tb_users';
    private static $tableRoles = 'tb_users__roles';
            
    public static function userExists($parameterCollection) {
        
        $collection = Database::select(self::$table)
                              ::where('username', $parameterCollection['username'])
                              ::andwhere('email', $parameterCollection['email'])
                              ::build();
        
        return (count($collection) > 0);
    }
    
    static function createUser($parameterCollection) {
         
        Database::insert(self::$table,$parameterCollection);
    }
    
    static function assignRoleToUser($userid, $roleId) {

        return Database::insert(self::$tableRoles, array(
            'user_id' => $userid,
            'role_id' => $roleId
        ));
    }
    
    public static function newSignUp($parameterCollection) {
        
        $newUser = self::createUser($parameterCollection);
        
        if($newUser) {
            return self::assignRoleToUser(Database::getLastInsertedId(), 1);
        }
    }
     
    public static function signIn($parameterCollection) {
         
        $userObject = Database::select(self::$table)
                              ::where('username',$parameterCollection['username'])
                              ::andWhere('password',$parameterCollection['password'])
                              ::buildSingle();
         
        if(is_null($userObject)) {
            return NULL;
        }   
         
        $userId                     = $userObject['id'];
        $getUserRoleCollectionQuery = " SELECT b.title AS role_title"
                                    . " FROM   tb_user__role     AS a, "
                                    . "        tm_roles          AS b "
                                    . " WHERE  user_id = $userId AND "
                                    . "        a.role_id = b.id";
        $userRoleCollection         = Database::getAll($getUserRoleCollectionQuery);         
        
        return array(
            'user'  => $userObject,
            'roles' => $userRoleCollection
        );
    }
     
}