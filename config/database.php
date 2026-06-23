<?php

class Database {
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo === null) {
            $host = '127.0.0.1';
            $db   = 'hotel_omega';
            $user = 'root';
            $pass = '';

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$db;charset=utf8mb4",
                    $user,
                    $pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die("DB ERROR: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
