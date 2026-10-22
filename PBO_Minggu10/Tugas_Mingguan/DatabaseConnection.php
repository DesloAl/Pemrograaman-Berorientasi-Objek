<?php
// Singleton: hanya ada satu koneksi PDO untuk seluruh aplikasi
class DatabaseConnection
{
    private static ?PDO $connection = null;

    private const DSN      = "mysql:host=localhost;dbname=materi_pdo;charset=utf8";
    private const USERNAME = "root";
    private const PASSWORD = "";

    // Constructor & clone di-private agar tidak bisa dibuat objek baru dari luar
    private function __construct() {}
    private function __clone() {}

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(self::DSN, self::USERNAME, self::PASSWORD, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
