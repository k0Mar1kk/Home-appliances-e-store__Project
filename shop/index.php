<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТехноДомъ - Магазин бытовой техники</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Шапка сайта -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <i class="fas fa-blender"></i>
                    <span>ТехноДомъ</span>
                </div>
                <div class="header-contacts">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+7 (495) 123-45-67</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Пн-Вс: 9:00-21:00</span>
                    </div>
                </div>
            </div>
            
            <div class="header-bottom">
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php" class="active"><i class="fas fa-home"></i> Главная</a></li>
                        <li><a href="catalog.php"><i class="fas fa-th-large"></i> Каталог</a></li>
                        <li><a href="delivery.php"><i class="fas fa-truck"></i> Доставка</a></li>
                        <li><a href="payment.php"><i class="fas fa-credit-card"></i> Оплата</a></li>
                        <li><a href="about.php"><i class="fas fa-info-circle"></i> О нас</a></li>
                        <li><a href="contacts.php"><i class="fas fa-envelope"></i> Контакты</a></li>
                    </ul>
                </nav>
                
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Поиск техники...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Главный баннер -->
    <section class="hero-banner">
        <div class="container">
            <div class="banner-content">
                <h1>Бытовая техника для вашего дома</h1>
                <p>Широкий выбор качественной техники по доступным ценам с гарантией и доставкой</p>
                <a href="catalog.php" class="btn btn-primary">Смотреть каталог</a>
                <a href="#features" class="btn btn-secondary">Узнать больше</a>
            </div>
        </div>
    </section>

    <!-- Категории товаров -->
    <section class="categories">
        <div class="container">
            <h2>Категории товаров</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                    <h3>Холодильники</h3>
                    <p>Более 50 моделей</p>
                    <a href="catalog.php?category=1">Смотреть</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Стиральные машины</h3>
                    <p>Автоматические и с сушкой</p>
                    <a href="catalog.php?category=2">Смотреть</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <h3>Телевизоры</h3>
                    <p>4K, Smart TV, OLED</p>
                    <a href="catalog.php?category=3">Смотреть</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-blender"></i>
                    </div>
                    <h3>Кухонная техника</h3>
                    <p>Для приготовления пищи</p>
                    <a href="catalog.php?category=4">Смотреть</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Популярные товары -->
    <section class="popular-products">
        <div class="container">
            <h2>Популярные товары</h2>
            <div class="products-grid" id="popular-products">
                <!-- Товары будут загружены через JavaScript -->
            </div>
            <div class="text-center">
                <a href="catalog.php" class="btn btn-outline">Весь каталог</a>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="features" id="features">
        <div class="container">
            <h2>Почему выбирают нас</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Гарантия качества</h3>
                    <p>Гарантия на всю технику от 1 года, официальная поставка</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-truck"></i>
                    <h3>Быстрая доставка</h3>
                    <p>Доставка в день заказа по Москве, бесплатно при заказе от 20 000 ₽</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-tools"></i>
                    <h3>Сервисное обслуживание</h3>
                    <p>Бесплатный выезд мастера, ремонт и консультации</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-credit-card"></i>
                    <h3>Удобная оплата</h3>
                    <p>Наличные, карты, рассрочка и кредит от банков-партнеров</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>ТехноДомъ</h3>
                    <p>Интернет-магазин бытовой техники с 2010 года. Мы предлагаем качественную технику от ведущих производителей.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Каталог</h3>
                    <ul>
                        <li><a href="catalog.php?category=1">Холодильники</a></li>
                        <li><a href="catalog.php?category=2">Стиральные машины</a></li>
                        <li><a href="catalog.php?category=3">Телевизоры</a></li>
                        <li><a href="catalog.php?category=4">Кухонная техника</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="delivery.php">Доставка</a></li>
                        <li><a href="payment.php">Оплата</a></li>
                        <li><a href="#">Гарантия</a></li>
                        <li><a href="#">Возврат</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Контакты</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> Москва, ул. Техническая, 15</p>
                        <p><i class="fas fa-phone"></i> +7 (495) 123-45-67</p>
                        <p><i class="fas fa-envelope"></i> info@tehnodom.ru</p>
                        <p><i class="fas fa-clock"></i> Пн-Вс: 9:00-21:00</p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 ТехноДомъ. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script src="js/products-data.js"></script>
    <script src="js/main.js"></script>
</body>
</html>