<?php
require_once 'database/config.php';
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM products");
    $result = $stmt->fetch();
    echo "✅ База данных подключена! Товаров: " . $result['count'];
} catch (PDOException $e) {
    echo "❌ Ошибка: " . $e->getMessage();
}
?>