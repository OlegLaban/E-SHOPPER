<?php

class SiteController {
    
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        
        $lastProduct = Product::getLatestProducts();
        
        $recomendedProduct = Product::getRecomendedProducts();
        
        require_once(ROOT . "/view/site/index.php");
        
        return true;
    }
    
    public function actionContact(){
        
        $userEmail = '';
        $userText = '';
        $result  = false;
        
        if(isset($_POST['submit'])){
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            
            $errors = false;
            
            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный email';
            }
            
            if($errors == false){
                $adminEmail = 'email@mail.ru';
                $message = "Текст: {$userText} от {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
            
        }
        require_once ROOT . '/view/site/contact.php';
        return true;
    }
}
