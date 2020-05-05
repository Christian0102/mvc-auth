<?php
/*  DB connection*/


class Db
{
   /**
    * Undocumented function
    *
    * @return instance of PDO
    */
    public static function getConnection()
    {
        /* Connect params file */
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        /*Init Connection*/
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Set Encoding */
        $db->exec("set names utf8");

        return $db;
    }



}


