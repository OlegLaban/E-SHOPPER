<?php


class ProductController 
{
    
    public function actionView($productId)
    {
        $categories = Category::getCategoriesList();
        
        
        $product = Product::getProductById($productId);
        require_once (ROOT . '/view/product/view.php');
        
        return true;
    }
}
