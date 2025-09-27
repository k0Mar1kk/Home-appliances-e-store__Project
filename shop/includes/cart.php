<?php
session_start();
// Если корзина не существует, создаем ее
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Добавление товара в корзину (обычно это делается через AJAX или форму, но для простоты сделаем GET)
if (isset($_GET['add_to_cart'])) {
    $product_id = (int)$_GET['add_to_cart'];
    // Проверяем, есть ли товар в корзине
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        // Получаем информацию о товаре из базы
        $product = getProduct($product_id);
        if ($product) {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1,
                'image_url' => $product['image_url']
            ];
        }
    }
}

// Удаление товара из корзины
if (isset($_GET['remove_from_cart'])) {
    $product_id = (int)$_GET['remove_from_cart'];
    unset($_SESSION['cart'][$product_id]);
}

// Обработка обновления количества
if (isset($_POST['update_quantity'])) {
    foreach ($_POST['quantities'] as $product_id => $quantity) {
        $quantity = (int)$quantity;
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$product_id]);
        } else {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
}

// Далее отображение корзины