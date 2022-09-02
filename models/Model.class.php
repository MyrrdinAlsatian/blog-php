<?php

abstract class Model
{

    private static $pdo;

    private static function setBdd()
    {
        // self::$pdo = new PDO("mysql:host=localhost;dbname=devaftga_blog;charset=utf8", "devaftga_blogging", "Permaculteur1");

        self::$pdo = new PDO(DB, DB_USER, DB_PASS);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
