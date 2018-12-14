<?php

class CartController {
    
    public function actionIndex(){
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $productsInCart = false;
       //Получаем данные из корзины
        $productsInCart = Cart::getProducts();
       
        if($productsInCart){
            //Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            
            //Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once  ROOT . '/view/cart/index.php';
        
        return true;
        
    }
    
    public function actionAdd($id, $count = 1)
    {
        //Добавляем товар в корзину
        Cart::addProduct($id, $count);
        
        //Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }
    
    public function actionaddAjax($id, $count = 1){
        echo Cart::addProduct($id, $count);
        
       
        return true;
    }
    
    public function actionDeleteAll($id)
    {
        $id = intval($id);
        Cart::deleteAllProduct($id);
        
        //if(count($_SESSION['products'] > 0)){
            header("Location: " . $_SERVER['HTTP_REFERER']);
        //}else{
          //  header("Location: /cart/");
        //}
        
        
        return true;
    }
    
    public function actionDelete()
    {
        if(isset($_POST['submit'])){
            $id = intval($_POST['id']);
            $count = intval($_POST['count']);
            Cart::deleteProducts($id, $count);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        
        
        return true;
    }
    
    public function actionCheckout(){
        $categories = array();
        $categories = Category::getCategoriesList();
        $errors = false;
        $result = false;
        
        if(isset($_POST['submit'])){
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userMess = $_POST['userMess'];
            
            //Валидация формы
            
            if(!User::checkName($userName)){
                $errors[] = "Имя введено некоректно.";
            }
            if(!User::checkPhone($userPhone)){
                $errors[] = "Мы не умеем звонить на номера короче 7-ми символов.";
            }
            
            
            
            if($errors == false){
               $productsInCart = Cart::getProducts();
               if(!User::isGuest()){
                   $userId = false;
               }else{
                   $userId = User::checkLogged();
               }
              
               $result = Order::save($userName, $userPhone, $userMess, $userId, $productsInCart);
               
               if($result){
                   // Оповещаем администратора о новом заказе
                   $adminEmail = 'myemail@gmail.com';
                   $message = "http://test1.local/admin/orders";
                   $subject = "Новый заказ";
                   mail($adminEmail, $subject, $message);
                   
                   //Очищаем корзину
                   Cart::clear();
               }
               
            }else{
                $productsInCart = Cart::getProducts();
                $productsId = array_keys($productsInCart);
                $productsInfo = Product::getProductsByIds($productsId);
                $price = Cart::getTotalPrice($productsInfo);
                $countProduct = Cart::countItems();
            }
            
            
            
        }else{
            $productsInCart = Cart::getProducts();
            if($productsInCart == false){
                header("Location: /");
            }else{
                $productsId = array_keys($productsInCart);
                $productsInfo = Product::getProductsByIds($productsId);
                $price = Cart::getTotalPrice($productsInfo);
                $countProduct = Cart::countItems();
                if(!User::isGuest()){
                   $userName = '';
                   
                }else{
                     
                     $user = User::checkLogged();
                     $userInfo = User::getUserById($user);
                     $userName = $userInfo['name'];
                }
                
            }
        }
        
        require_once(ROOT . "/view/cart/checkout.php");
        return true;
    }
}
