<?php

class CabinetController 
{
    
    public function actionIndex()
    {
        
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        require_once(ROOT . "/view/cabinet/index.php");
        
        return true;
    }
    
    public function actionEdit()
    {
        
        // Получаем индентификатор пользователя из сесии 
        $userId = User::checkLogged();
        
        // Получаем информации о пользователе из БД.
        $user = User::getUserById($userId);
        
        $name  = $user['name'];
        $password = $user['password'];
        
        $result = false;
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::checkName($name)){
                $errors[] = 'Имя должно быть не короче 2-х символов';
            }
            
            if(!User::checkPassword($password)){
                $errors = 'Пароль не должен быть короче 6-ти смиволов';
            }
            
            if($errors == false){
                $resutl = User::edit($userId, $name, $password);
            }
        }
        
        require_once(ROOT . "/view/cabinet/edit.php");
        
        return true;
    }
}
