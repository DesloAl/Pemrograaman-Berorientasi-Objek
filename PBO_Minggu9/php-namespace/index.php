<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\UserService;
use App\Services\ProductService;

try {
    $userService = new UserService();
    $user = $userService->createUser('Budi', 'budi@example.com');
    echo "<h3>Data User</h3>";
    echo $userService->displayUser($user);

    $productService = new ProductService();
    $products = [
        $productService->createProduct('Laptop', 8500000),
        $productService->createProduct('Mouse Wireless', 175000),
    ];

    echo "<h3>Daftar Produk</h3>";
    foreach ($products as $product) {
        echo $productService->displayProduct($product) . "<br><br>";
    }
} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}
