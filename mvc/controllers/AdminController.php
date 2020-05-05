<?php

class AdminController extends AdminBase
{
    /**
     * index action for  index admin route
     *
     * @return void
     */
    public function actionIndex()
    {
      

        self::checkLogged();
        $userId  = SessionHelper::checkLogged();
        
        $user = Users::getUserById($userId);
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
  

   
}
