<?php 
namespace App;
use PDO;

class Config {
    public static function getPDO(): PDO {
        return new PDO("mysql:dbname=gym;host=localhost;", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}