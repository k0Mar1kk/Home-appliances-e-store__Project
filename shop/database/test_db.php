<?php
require_once 'database/config.php';

try {
    $pdo = getDBConnection();
    
    // Проверка подключения
    $stmt = $pdo->query("SELECT COUNT(*) as product_count FROM products");
    $result = $stmt->fetch();
    
    echo "✅ База данных подключена успешно!<br>";
    echo "📦 Количество товаров в базе: " . $result['product_count'] . "<br>";
    
    // Проверка категорий
    $stmt = $pdo->query("SELECT name FROM categories");
    echo "📋 Категории: ";
    while ($row = $stmt->fetch()) {
        echo $row['name'] . ", ";
    }
    
} catch (PDOException $e) {
    echo "❌ Ошибка: " . $e->getMessage();
}
?>