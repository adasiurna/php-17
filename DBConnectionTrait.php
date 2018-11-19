<?php
const HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DATABASE = 'countries';

trait DBConnectionTrait
{
    protected static $pdo;

    public static function loadDatabase()
    {
        if (!self::$pdo instanceof \PDO) {
            self::$pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8mb4', DB_USER, DB_PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
    }
}
