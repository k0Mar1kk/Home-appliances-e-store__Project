<?php
require_once 'db_connect.php';

function getCategories() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM categories');
    return $stmt->fetchAll();
}

function getProducts($category_id = null) {
    global $pdo;
    $sql = 'SELECT * FROM products';
    if ($category_id) {
        $sql .= ' WHERE category_id = :category_id';
    }
    $stmt = $pdo->prepare($sql);
    if ($category_id) {
        $stmt->execute(['category_id' => $category_id]);
    } else {
        $stmt->execute();
    }
    return $stmt->fetchAll();
}

function getProduct($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

