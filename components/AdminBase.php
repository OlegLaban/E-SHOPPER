<?php
abstract class AdminBase 
{
    public static function isAdmin()
    {
        $isAuth = User::checkLogged();
        
        $UserInfo = User::getUserById($isAuth);
        
        if($UserInfo['role'] == 'admin'){
            return true;
        }
        
        return die('Access is denied');
    }
}
