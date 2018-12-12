<?php
class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::isAdmin();
        $productsList = Product::getAdminProduct();
        
        require_once(ROOT . '/view/admin_product/index.php');
        return true;
    }
    
    public function actionCreate()
    {
        self::isAdmin();
        $categoriesList = Category::getAdminCategoriesList();
        
        $productArr = [];
        
        if(isset($_POST['submit'])){
            $productArr['name'] = $_POST['name'];
            $productArr['code'] = $_POST['code'];
            $productArr['price'] = $_POST['price'];
            $productArr['category_id'] = $_POST['category_id'];
            $productArr['brand'] = $_POST['brand'];
            $productArr['description'] = $_POST['description'];
            $productArr['availability'] = $_POST['availability'];
            $productArr['is_new'] = $_POST['is_new'];
            $productArr['is_recommended'] = $_POST['is_recommended'];
            $productArr['status'] = $_POST['status'];
            $productArr['image'] = Product::fileUpload($_FILES['image']);
            
            Product::addNewProduct($productArr);
            
            
        }
        
        require_once(ROOT . '/view/admin_product/create.php');
        return true;
    }
    
    public function actionUpdate($id)
    {
        self::isAdmin();
        $id = intval($id);
        
        $categoriesList = Category::getAdminCategoriesList();
        
        $product = Product::getProductById($id);
        
        $productUpdate = array();
        
        if(isset($_POST['submit'])){
            //Массив с новыми значениями
            $productUpdate['name'] = $_POST['name'];
            $productUpdate['code'] = $_POST['code'];
            $productUpdate['price'] = $_POST['price'];
            $productUpdate['category_id'] = $_POST['category_id'];
            $productUpdate['brand'] = $_POST['brand'];
            $productUpdate['description'] = $_POST['description'];
            $productUpdate['availability'] = $_POST['availability'];
            $productUpdate['is_new'] = $_POST['is_new'];
            $productUpdate['is_recommended'] = $_POST['is_recommended'];
            $productUpdate['status'] = $_POST['status'];
            $productUpdate['image'] = Product::fileUpload($_FILES['image']);
           
            Product::updateProduct($productUpdate, $id);
            
            
        }
        
        require_once(ROOT . '/view/admin_product/update.php');
        return true;
    }
    
    public function actionDelete($id)
    {
        self::isAdmin();
        $id = intval($id);
        
        Product::productDelete($id);
        $referer = $_SERVER['HTTP_REFERER'];
        
        header("Location: {$referer}");
        return true;
        
    }
    
}
