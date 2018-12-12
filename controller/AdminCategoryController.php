<?php
class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::isAdmin();
        $categoriesList = Category::getAdminCategoriesList();
       
        require_once(ROOT . '/view/admin_category/index.php');
        return true;
    }
    
    public function actionCreate()
    {
        self::isAdmin();
        
        if(isset($_POST['submit'])){
            $categoryAdd = array();
            $categoryAdd['name'] = $_POST['name'];
            $categoryAdd['sort_order'] = $_POST['sort_order'];
            $categoryAdd['status'] = $_POST['status'];
            Category::addAdminCategory($categoryAdd);
        }
        
        require_once (ROOT . '/view/admin_category/create.php');
        return true;
        
    }
    
    public function actionUpdate($id)
    {
        self::isAdmin();
        $id = intval($id);
        
        if(isset($_POST['submit'])){
            $categoryUpd = array();
            $categoryUpd['name'] = $_POST['name'];
            $categoryUpd['sort_order'] = $_POST['sort_order'];
            $categoryUpd['status'] = $_POST['status'];
            Category::updAdminCategory($id, $categoryUpd);
        }
        $category = Category::getAdminCategory($id);
        require_once(ROOT . '/view/admin_category/update.php');
        return true;
    }
    
    public function actionDelete($id)
    {
        self::isAdmin();
        $id = (int) $id;
        
        if(isset($_POST['submit'])){
            Category::deleteCategory($id);
            header("Location: /admin/category/");
        }
        require_once(ROOT . '/view/admin_category/delete.php');
        return true;
    }
    
}
