<?php
require_once 'DatabaseConnection.php';

class Product
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    // Tambah data
    public function save(string $name, float $price, int $stock): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)"
        );
        return $stmt->execute([':name' => $name, ':price' => $price, ':stock' => $stock]);
    }

    // Lihat semua
    public function findAll(): array
    {
        return $this->db->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
    }

    // Lihat satu
    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    // Update data
    public function update(int $id, string $name, float $price, int $stock): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE products SET name = :name, price = :price, stock = :stock WHERE id = :id"
        );
        return $stmt->execute([':id' => $id, ':name' => $name, ':price' => $price, ':stock' => $stock]);
    }

    // Hapus data
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
