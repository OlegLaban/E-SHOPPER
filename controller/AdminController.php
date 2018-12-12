<?php

class AdminController extends AdminBase
{
    public function actionIndex() 
    {
        self::isAdmin();
        
        require_once(ROOT . '/view/admin/index.php');
        return true;
    }
    
        
}
