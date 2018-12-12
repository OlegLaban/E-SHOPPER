<?php

class Product 
{
    const SHOW_BY_DEFAULT = 6;
    
    public static function addNewProduct($productsArr)
    {
         $db = Db::getConnection();
         $sql = "INSERT INTO `product` (`name`, `category_id`, `code`, `price`, "
                 . "`availability`, `brand`, `image`, `description`, `is_new`, "
                 . "`is_recomended`, `status`) "
                 . "VALUES (:name, :category_id, :code, :price, :availability,"
                 . " :brand, :image, :description, :is_new, :is_recomended, :status)";
         $result = $db->prepare($sql);
         $result->execute(array(
             ':name' => $productsArr['name'],
             ':category_id' => $productsArr['category_id'],
             ':code' => $productsArr['code'],
             ':price' => $productsArr['price'],
             ':availability' => $productsArr['availability'],
             ':brand' => $productsArr['brand'],
             ':image' => $productsArr['image'],
             ':description' => $productsArr['description'],
             ':is_new' => $productsArr['is_new'],
             ':is_recomended' => $productsArr['is_recommended'],
             ':status' => $productsArr['status']
         ));
        
    }
    
    public static function updateProduct($productUpdate, $id){
        $db = Db::getConnection();
         $sql = "UPDATE `product` SET `name` = :name, `category_id` = :category_id, `code` = :code,"
                 . " `price` = :price, `availability` = :availability, `brand` = :brand, "
                 . " `image` = :image, `description` = :description, `is_new` = :is_new,"
                 . " `is_recomended` = :is_recomended, `status` = :status WHERE `id` = :id";
         $result = $db->prepare($sql);
         $result->execute(array(
             ':name' => $productUpdate['name'],
             ':category_id' => $productUpdate['category_id'],
             ':code' => $productUpdate['code'],
             ':price' => $productUpdate['price'],
             ':availability' => $productUpdate['availability'],
             ':brand' => $productUpdate['brand'],
             ':image' => $productUpdate['image'],
             ':description' => $productUpdate['description'],
             ':is_new' => $productUpdate['is_new'],
             ':is_recomended' => $productUpdate['is_recommended'],
             ':status' => $productUpdate['status'],
             ':id' => $id
         ));
    }
    
    public static function productDelete($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM `product` WHERE `id` = :id";
        $result = $db->prepare($sql);
        
        $result->execute(array(
            ':id' => $id
        ));    
    }
    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        
        $db = Db::getConnection();
        
        $productList = array();
        
        $result  = $db->query("SELECT `id`, `name`, `price`, `image`, `is_new`" 
                . " FROM `product` WHERE `status` = '1'" . 
                "ORDER BY `id` DESC LIMIT {$count}");
        
        $i = 0;
        while($row = $result->fetch()){
            $productList[$i]['id'] = $row['id']; 
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        
        return $productList;
    }
    
    
   public static function getProductsListByCategory($categoryId = false, $page = 1)
   {
       if($categoryId){
          
           $categoryId = intval($categoryId);
           
           $page = intval($page);
           $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
           $db = Db::getConnection();
           $products = array();
           $result = $db->query("SELECT `id`, `name`, `price`, `image`, `is_new`"
                   . " FROM `product` WHERE `status` = '1'"
                   . " AND `category_id` = '{$categoryId}' ORDER BY "
                   . "`id` DESC LIMIT " . self::SHOW_BY_DEFAULT
                   . " OFFSET " . $offset);
                   $i = 0;
                   while($row = $result->fetch()){
                       $products[$i]['id'] = $row['id'];
                       $products[$i]['name'] = $row['name'];
                       $products[$i]['price'] = $row['price'];
                       $products[$i]['image'] = $row['image'];
                       $products[$i]['is_new'] = $row['is_new'];
                       $i++;
                   }
                   return $products;
                   
                   
       }
       
   }
    
   public static function getProductById($productId)
   {
       if($productId){
           $productId = intval($productId);
           $db = Db::getConnection();
           $result = $db->query("SELECT * FROM `product` WHERE id = {$productId}");
           $result->setFetchMode(PDO::FETCH_ASSOC);
           
           return $result->fetch();
       }
       
   }
   
   public static function getTotalproductsInCategory($categoryId)
   {
       $db = Db::getConnection();
       
       $categoryId = intval($categoryId);
       
       $result = $db->query("SELECT count(id) AS count FROM `product` "
               . "WHERE status = '1' AND `category_id` = '{$categoryId} '");
       $result->setFetchMode(PDO::FETCH_ASSOC);
       $row = $result->fetch();
       return $row['count'];
   }
   
   public static function getProductsByIds($idsArray)
   {
       $products = array();
       
       $db = Db::getConnection();
       
       $idsString = implode(',', $idsArray);
       
       $sql = "SELECT * FROM `product` WHERE status='1' AND `id` IN ($idsString)";
       
       $result = $db->query($sql);
       $result->setFetchMode(PDO::FETCH_ASSOC);
       
       $i = 0;
       while($row = $result->fetch()){
           $products[$i]['id'] = $row['id'];
           $products[$i]['code'] = $row['code'];
           $products[$i]['name'] = $row['name'];
           $products[$i]['price'] = $row['price'];
           $i++;
       }
       return $products;
   }
   
   public static function getAllTotalProducts()
   {
       $db = Db::getConnection();
       $result = $db->prepare("SELECT COUNT(id) AS `count` FROM `product` WHERE `status` = 1");
       $result->execute();
       $row = $result->fetch();
       return intval($row['count']);
   }
   
   public static function getAdminProduct($id = false){
       $db = Db::getConnection();
       $prod = array();
       $sql = "SELECT `id`, `name`, `code`, `price` FROM `product`";
       $prod = $db->prepare($sql);
       $prod->execute();
       return $prod->fetchAll(PDO::FETCH_ASSOC);
       
   }
   
   public static function fileUpload($dataFile)
   {
       if(count($dataFile) > 0){
           $fileName = md5(time()) . '.jpg';
           $tmp_name = $dataFile['tmp_name'];
           $path = '/template/uploadImage/' . $fileName;
           $fullpath = ROOT . $path;
           move_uploaded_file($tmp_name, $fullpath);
           return $path;
       }
       return false;
       
   }
     
}

