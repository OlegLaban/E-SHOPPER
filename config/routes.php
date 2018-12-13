<?php
return array(
    //Пути ЧПУ 
    
    'product/([0-9]+)' => 'product/view/$1', //  controller 'product' action 'view'
    
    'catalog' => 'catalog/index',
    
    
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    
    'contact' => 'site/contact',
    
    //Пути для контроллера корзины 
    'cart/addAjax/([0-9]+)/([0-9]+)'=> 'cart/addAjax/$1/$2',
    'cart/add' => 'cart/add',
    'cart/checkout' => 'cart/checkout',
    'cart' => 'cart/index',
    
    //Пути для категорий (админ панель)
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/create' => 'adminCategory/create',
    'admin/category' => 'adminCategory/index',
    
    //Пути для заказов (админ панель)
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    
    //Пути для продуктов (админ панель)
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/create' => 'adminProduct/create',
    'admin/product' => 'adminProduct/index',
    
    
    'admin' => 'admin/index',
    
    //Пути для контроллера регистрации
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    //пути для кабинета
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    
    
    '' => 'site/index',
    
);