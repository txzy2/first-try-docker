<?php

class Database
{
    private const HOST = 'postgres';
    private const DB = 'mydatabase';
    private const USER = 'myuser';
    private const PASSWORD = 'mypassword';
    private static $pdo = null;

    // Статический метод для подключения к базе данных
    public static function connection()
    {
        if (self::$pdo === null) {
            $dsn = "pgsql:host=" . self::HOST . ";dbname=" . self::DB;

            try {
                self::$pdo = new PDO($dsn, self::USER, self::PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                echo "Ошибка подключения к базе данных: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}