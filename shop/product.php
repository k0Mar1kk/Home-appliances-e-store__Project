<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Холодильник Samsung RB37 - ТехноДомъ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <header>...</header>

        <section class="breadcrumbs">
        <div class="container">
            <a href="index.php">Главная</a> > 
            <a href="catalog.php">Каталог</a> > 
            <a href="catalog.php?category=1">Холодильники</a> > 
            <span>Холодильник Samsung RB37</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container">
        <div class="product-detail">
            <div class="product-gallery">
                <div class="main-image">
                    <img src="images/products/fridge-samsung.jpg" alt="Холодильник Samsung RB37">
                </div>
                <div class="thumbnails">
                    <img src="images/products/fridge-samsung-2.jpg" alt="Вид сбоку">
                    <img src="images/products/fridge-samsung-3.jpg" alt="Внутреннее пространство">
                </div>
            </div>
            
            <div class="product-info">
                <h1>Холодильник Samsung RB37</h1>
                <div class="product-meta">
                    <span class="sku">Артикул: SAMS-RB37</span>
                    <span class="stock in-stock">В наличии</span>
                    <span class="rating">★★★★★ (12 отзывов)</span>
                </div>
                
                <div class="price-section">
                    <div class="current-price">54 990 ₽</div>
                    <div class="old-price">59 990 ₽</div>
                    <div class="discount">Экономия 5 000 ₽</div>
                </div>
                
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button class="qty-btn minus">-</button>
                        <input type="number" value="1" min="1" max="10" class="qty-input">
                        <button class="qty-btn plus">+</button>
                    </div>
                    <button class="btn btn-primary add-to-cart" data-product-id="1">
                        <i class="fas fa-cart-plus"></i> Добавить в корзину
                    </button>
                    <button class="btn btn-outline add-to-favorite">
                        <i class="far fa-heart"></i> В избранное
                    </button>
                </div>
                
                <div class="delivery-info">
                    <p><i class="fas fa-truck"></i> Бесплатная доставка завтра</p>
                    <p><i class="fas fa-shield-alt"></i> Гарантия 3 года</p>
                    <p><i class="fas fa-undo"></i> Возврат в течение 14 дней</p>
                </div>
            </div>
        </div>
        
        <div class="product-tabs">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="description">Описание</button>
                <button class="tab-btn" data-tab="specifications">Характеристики</button>
                <button class="tab-btn" data-tab="reviews">Отзывы (12)</button>
            </div>
            
            <div class="tab-content active" id="description">
                <h3>Описание товара</h3>
                <p>Двухкамерный холодильник Samsung RB37 с системой No Frost - идеальное решение для современной кухни.</p>
                <ul>
                    <li>Общий объем: 367 литров</li>
                    <li>Система No Frost - не требует разморозки</li>
                    <li>Класс энергопотребления: A+</li>
                    <li>Инверторный компрессор - тихая работа</li>
                    <li>Зона свежести для овощей и фруктов</li>
                </ul>
            </div>
            
            <div class="tab-content" id="specifications">
                <h3>Технические характеристики</h3>
                <table class="specs-table">
                    <tr><td>Бренд</td><td>Samsung</td></tr>
                    <tr><td>Модель</td><td>RB37</td></tr>
                    <tr><td>Объем холодильной камеры</td><td>272 л</td></tr>
                    <tr><td>Объем морозильной камеры</td><td>95 л</td></tr>
                    <tr><td>Энергопотребление</td><td>А+</td></tr>
                    <tr><td>Уровень шума</td><td>38 дБ</td></tr>
                    <tr><td>Габариты (ШxВxГ)</td><td>60x185x65 см</td></tr>
                    <tr><td>Цвет</td><td>Нержавеющая сталь</td></tr>
                </table>
            </div>
            
            <div class="tab-content" id="reviews">
                <h3>Отзывы покупателей</h3>
                <div class="reviews-list">
                    <div class="review">
                        <div class="review-header">
                            <span class="review-author">Иван Петров</span>
                            <span class="review-date">15.12.2023</span>
                            <span class="review-rating">★★★★★</span>
                        </div>
                        <p>Отличный холодильник! Тихий, вместительный, красивый. No Frost действительно работает - никакого льда.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

        <footer>...</footer>

    <script src="js/product.js"></script>
</body>
</html>