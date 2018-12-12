<?php

class Order {
    public static function save($userName, $userPhone, $userMess, $userId, $products)
    {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO `product_order` (user_name, user_phone, user_comment, user_id, products)'
                . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';
        
        $products = json_encode($products);
       
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userMess, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getOrderList()
    {
        $db = Db::getConnection();
        
        $sql = "SELECT `id`, `user_name`, `user_phone`, `date`, `status` FROM `product_order`";
        
        $result = $db->query($sql);
        $orderList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $orderList;
    }
    
    public static function getOrderById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM `product_order` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->execute(array(
            ':id' => $id
        ));
        
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function updateOrder($id, $updOrderArr)
    {
        $db = Db::getConnection();
        $sql = "UPDATE  `product_order` SET `user_name` = :user_name, `user_phone` = :user_phone, "
                . "`user_comment` = :user_comment, `status` = :status WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->execute(array(
            ':user_name' => $updOrderArr['userName'],
            ':user_phone' => (int) $updOrderArr['userPhone'],
            ':user_comment' => $updOrderArr['userComment'],
            ':status' => (int) $updOrderArr['status'],
            ':id' => (int) $id
        ));
                
    }
    
   public static function deleteOrder($id)
   {
       $db = Db::getConnection();
       $sql = "DELETE FROM `product_order`WHERE `id` = :id ";
       $result = $db->prepare($sql);
       $result->execute(array(
           ':id' => $id
       ));
   }
    
    public static function getStatusText($status)
    {
        switch ($status){
            case 0: return "Новый заказ"; break;
            case 1: return "В обработке"; break;
            case 2: return "Доставляется"; break;
            case 3: return "Закрыт"; break;
        }
    }
    
}
