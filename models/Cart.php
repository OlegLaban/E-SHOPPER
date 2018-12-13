<?php

class Cart 
{
    public static function addProduct($id, $count)
    {
        $id = intval($id);
        $count = intval($count);
        //Пустой массив для товаров в корзине.
        $productsInCart = array();
        
        //Если в корзине уже есть товары (Они зранятся в сесии)
        if(isset($_SESSION['products'])){
            //То заполним нащ массив товарами
            $productsInCart = $_SESSION['products'];
        }
        
        //Если товар есть в корзине, но был добавлен еще раз, увеличиваем колличество
        if($count > 0){
            if(array_key_exists($id, $productsInCart)){
                $productsInCart[$id] += $count;
            }else{
                //Добавляем новыйтовар в корзину
                $productsInCart[$id] = $count;
            }
        }/*else {
            if(array_key_exists($id, $productsInCart)){
                $productsInCart[$id]++;
            }else{
                //Добавляем новыйтовар в корзину
                $productsInCart[$id] = 1;
             }
        }*/
        
        $_SESSION['products'] = $productsInCart;
        
        return self::countItems();
        
    }
    
    public static function countItems()
    {
        if(isset($_SESSION['products'])){
            $count = 0;
            foreach($_SESSION['products'] as $id => $quantity){
                $count = $count + $quantity;
            }
            return $count;
        }else{
            return 0;
        }
    }
    
    public static function getProducts()
    {
        if(isset($_SESSION['products'])){
            return $_SESSION['products'];
        }
        return false;
    }
    
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        
        $total = 0;

        if($productsInCart){
            foreach($products as $item){
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }
    public static function clear()
     {
        if(isset($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }
    
    
}
