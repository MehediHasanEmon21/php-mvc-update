<?php

namespace Core;
use PDO;
use App\Config;
use PDOException;

abstract class Model {

    public static function getDB()
    {   
        static $db;

        if($db == null){
            try {
                $db = $conn = new PDO("mysql:host=". Config::DB_HOST .";dbname=". Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;


    }

}