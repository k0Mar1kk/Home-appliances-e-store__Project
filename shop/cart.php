<?php
session_start();
require_once 'config.php';

// Обработка действий с корзиной
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        // Добавление товара в корзину
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
    
    if (isset($_POST['update_cart'])) {
        // Обновление количества товаров
        foreach ($_POST['quantity'] as $product_id => $quantity) {
            $quantity = intval($quantity);
            if ($quantity <= 0) {
                unset($_SESSION['cart'][$product_id]);
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    }
    
    if (isset($_POST['remove_item'])) {
        // Удаление товара из корзины
        $product_id = intval($_POST['product_id']);
        unset($_SESSION['cart'][$product_id]);
    }
    
    if (isset($_POST['clear_cart'])) {
        // Очистка корзины
        $_SESSION['cart'] = [];
    }
}

// Получаем информацию о товарах в корзине
$cart_items = [];
$total_price = 0;
$total_items = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) 
     try 
        
        {$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Формируем запрос для получения информации о товарах
        $placeholders = str_repeat('?,', count($_SESSION['cart']) - 1) . '?';
        $stmt = $dbh->prepare("
            SELECT id, name, price, image, stock 
            FROM products 
            WHERE id IN ($placeholders)
        ");
        
        $stmt->execute(array_keys($_SESSION['cart']));
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Формируем массив товаров с количеством
        foreach ($products as $product) {
            $product_id = $product['id'];
            $quantity = $_SESSION['cart'][$product_id];
            $item_total = $product['price'] * $quantity;
            
            $cart_items[] = [
                'id' => $product_id,
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'stock' => $product['stock'],
                'quantity' => $quantity,
                'total' => $item_total
            ];
            
            $total_price += $item_total;
            $total_items += $quantity;
        }
        
    } catch (PDOException $e) {
        error_log("Ошибка базы данных: " . $e->getMessage());
   }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина - Магазин бытовой техники</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }
        
        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        
        .cart-item-details {
            flex-grow: 1;
        }
        
        .cart-item-quantity {
            width: 60px;
            padding: 5px;
            text-align: center;
        }
        
        .cart-summary {
            background: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: #007bff;
            color: white;
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <?php include 'templates/header.php'; ?>
    
    <div class="cart-container">
        <h1>Корзина покупок</h1>
        
        <?php if (empty($cart_items)): ?>
            <div class="empty-cart">
                <h2>Ваша корзина пуста</h2>
                <p>Перейдите в каталог, чтобы добавить товары</p>
                <a href="catalog.php" class="btn btn-primary">Перейти в каталог</a>
            </div>
        <?php else: ?>
            <form method="POST" action="cart.php">
                <div class="cart-items">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="cart-item">
                            <img src="/assets/images/products/<?= htmlspecialchars($item['image']) ?>" 
                                 alt="<?= htmlspecialchars($item['name']) ?>" 
                                 class="cart-item-image">
                            
                            <div class="cart-item-details">
                                <h3><?= htmlspecialchars($item['name']) ?></h3>
                                <p class="price">Цена: <?= number_format($item['price'], 0, ',', ' ') ?> ₽</p>
                            </div>
                            
                            <div class="cart-item-controls">
                                <input type="number" 
                                       name="quantity[<?= $item['id'] ?>]" 
                                       value="<?= $item['quantity'] ?>" 
                                       min="1" 
                                       max="<?= $item['stock'] ?>"
                                       class="cart-item-quantity">
                                
                                <p class="item-total">Сумма: <?= number_format($item['total'], 0, ',', ' ') ?> ₽</p>
                                
                                <button type="submit" 
                                        name="remove_item" 
                                        value="1"
                                        class="btn btn-danger">Удалить</button>
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="cart-actions">
                    <button type="submit" name="update_cart" class="btn btn-primary">
                        Обновить корзину
                    </button>
                    
                    <button type="submit" name="clear_cart" class="btn btn-danger">
                        Очистить корзину
                    </button>
                </div>
            </form>
            
            <div class="cart-summary">
                <h2>Итоговая сумма</h2>
                <p>Товаров в корзине: <?= $total_items ?> шт.</p>
                <p>Общая стоимость: <strong><?= number_format($total_price, 0, ',', ' ') ?> ₽</strong></p>
                
                <a href="checkout.php" class="btn btn-success">Оформить заказ</a>
            </div>
        <?php endif; ?>
    </div>
    
    <?php include 'templates/footer.php'; ?>
    
    <script>
        // Автоматическое обновление при изменении количества
        document.querySelectorAll('.cart-item-quantity').forEach(input => {
            input.addEventListener('change', function() {
                this.form.submit();
            });
        });
    </script>
</body>
</html>