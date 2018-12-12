<?php


/**
 * Description of Db
 *
 * @author oleg
 */
class Db {
    
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("SET NAMES utf8");
        return $db;
    }
       
     
}
