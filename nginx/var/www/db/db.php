<?php

class Database
{
    private const HOST = 'postgres';
    private const DB = 'mydatabase';
    private const USER = 'myuser';
    private const PASSWORD = 'mypassword';

    public static function connection()
    {
        $dsn = "pgsql:host=" . self::HOST . ";dbname=" . self::DB;
        try {
            $pdo = new PDO($dsn, self::USER, self::PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            return $pdo;
        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных: " . $e->getMessage();
            return null;
        }
    }
}
