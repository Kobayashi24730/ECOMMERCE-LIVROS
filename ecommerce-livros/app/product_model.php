<?php
require_once __DIR__.'/db.php';

function getAllProducts() {
    $pdo = getPDO();
    return $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
}

function getProductById($id){
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// CRUD admin: createProduct, updateProduct, deleteProduct
