<?php

class AdminOrderController extends AdminBase
{
    public function actionIndex()
    {
        self::isAdmin();
        $ordersList = Order::getOrderList();
        
        require_once(ROOT . '/view/admin_order/index.php');
        return true;
    }
    
    public function actionView($id)
    {
        self::isAdmin();
        $id = (int) $id;
        $order = Order::getOrderByid($id);
        $productsJson =  $order['products'];
        $productsArr = json_decode($productsJson, true);
        $idProducts = array_keys($productsArr);
        $products = Product::getProductsByIds($idProducts);
        
        require_once(ROOT . '/view/admin_order/view.php');
        return true;
    }
    
    public function actionUpdate($id)
    {
        self::isAdmin();
        $id = (int) $id;
       
        if(isset($_POST['submit'])){
            $updOrder = array();
            $updOrder['userName'] = $_POST['userName'];
            $updOrder['userPhone'] = $_POST['userPhone'];
            $updOrder['userComment'] = $_POST['userComment'];
            $updOrder['date'] = $_POST['date'];
            $updOrder['status'] = $_POST['status'];
            Order::updateOrder($id, $updOrder);
        }
        $order = Order::getOrderById($id);
        require_once(ROOT . '/view/admin_order/update.php');
        return true;
    }
    
    public function actionDelete($id)
    {
        self::isAdmin();
        $id = intval($id);
        if(isset($_POST['submit'])){
            Order::deleteOrder($id);
            header("Location: /admin/order");
        }
        $order = Order::getOrderById($id);
        require_once(ROOT . '/view/admin_order/delete.php');
        return true;
        
    }
    
}

