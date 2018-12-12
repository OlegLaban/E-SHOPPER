<?php

class Category {
    
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        
        $result = $db->query("SELECT id, name FROM `category` ORDER BY `sort_order` ASC");
        
        
        $i = 0;
        
        while($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }
    
    public static function getAdminCategoriesList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        
        $result = $db->query("SELECT `id`, `name`, `sort_order`, `status` FROM `category` ORDER BY `sort_order` ASC");
        
        $CatList = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $CatList;
    }
    
    public static function getStatusText($status)
    {
        switch ($status){
            case 1: return "Активно"; break;
            case 0: return "Не активно";
        }
            
    }
    
    public static function getAdminCategory($id)
    {
        $db = Db::getConnection();
        
        $sql = "SELECT * FROM `category` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->execute(array(
            ':id' => (int) $id
        ));
        $resultArr = $result->fetch(PDO::FETCH_ASSOC);
        
        return $resultArr;
    }
    
    public static function addAdminCategory($addCategoryArr)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `category` (`name`, `sort_order`, `status`)'
                . 'VALUES(:name, :sort_order, :status)';
        $result = $db->prepare($sql);
        $result->execute(array(
            ':name' => $addCategoryArr['name'],
            ':sort_order' => (int) $addCategoryArr['sort_order'],
            ':status' => (int) $addCategoryArr['status']
        ));
       
    }
    
    public static function updAdminCategory($id, $updCategoryArr)
    {
        $db = Db::getConnection();
        $sql = "UPDATE `category` SET `name` = :name, "
                . "`sort_order` = :sort_order, `status` = :status "
                . "WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->execute(array(
            ':name' => $updCategoryArr['name'],
            ':sort_order' => (int) $updCategoryArr['sort_order'],
            ':status' => (int) $updCategoryArr['status'],
            ':id' => (int) $id        
        ));
        
    }
    
    public static function deleteCategory($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM `category` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->execute(array(
            ':id' => (int) $id
        ));
    }
}
