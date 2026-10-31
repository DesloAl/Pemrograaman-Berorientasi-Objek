<?php

// Singleton: hanya ada satu koneksi database yang dipakai bersama
class Database
{
    private static ?PDO $koneksi = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$koneksi === null) {
            self::$koneksi = new PDO("mysql:host=127.0.0.1;dbname=toko_online;charset=utf8mb4", "root", "");
            self::$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$koneksi;
    }
}
