<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

// Получаем популярные товары (например, первые 5)
$products = getProducts();
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин бытовой техники</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <section class="hero">
            <h1>Добро пожаловать в наш магазин бытовой техники!</h1>
            <p>Лучшие товары по низким ценам</p>
        </section>

        <section class="categories">
            <h2>Категории</h2>
            <div class="category-list">
                <?php foreach ($categories as $category): ?>
                <div class="category">
                    <h3><?= htmlspecialchars($category['name']) ?></h3>
                    <p><?= htmlspecialchars($category['description']) ?></p>
                    <a href="catalog.php?category=<?= $category['id'] ?>">Смотреть товары</a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="popular-products">
            <h2>Популярные товары</h2>
            <div class="product-list">
                <?php foreach (array_slice($products, 0, 5) as $product): ?>
                <div class="product">
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="200">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>Цена: <?= number_format($product['price'], 0, ',', ' ') ?> руб.</p>
                    <a href="product.php?id=<?= $product['id'] ?>">Подробнее</a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>