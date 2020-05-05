<?php

abstract class AdminBase
{


    public static function checkLogged()
    {

        $userId = SessionHelper::checkLogged();
        
        $user = Users::getUserById($userId);
        if (is_array($user)) {
            return true;
        }

        die('Access denied');
    }
}
