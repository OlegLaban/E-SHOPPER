<?php


class CatalogController
{
    public function actionIndex($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $lastProduct = array();
        $lastProduct = Product::getLatestProducts(6);
        
        require_once(ROOT . '/view/catalog/index.php');
        
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
             
        $categories = array();
        $categories = Category::getCategoriesList();
        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        
        $total  = Product::getTotalProductsInCategory($categoryId);
        
        
        //Создаем объект Pagination - постраничная навигация.
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        
        require_once(ROOT . '/view/catalog/category.php');
        
        return true;
    }
    
    
}
