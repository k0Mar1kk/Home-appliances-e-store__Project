<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров - ТехноДомъ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
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
                        <li><a href="index.php"><i class="fas fa-home"></i> Главная</a></li>
                        <li><a href="catalog.php" class="active"><i class="fas fa-th-large"></i> Каталог</a></li>
                        <li><a href="delivery.php"><i class="fas fa-truck"></i> Доставка</a></li>
                        <li><a href="payment.php"><i class="fas fa-credit-card"></i> Оплата</a></li>
                        <li><a href="about.php"><i class="fas fa-info-circle"></i> О нас</a></li>
                        <li><a href="contacts.php"><i class="fas fa-envelope"></i> Контакты</a></li>
                    </ul>
                </nav>
                
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" id="search-input" placeholder="Поиск техники...">
                        <button id="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="breadcrumbs">
        <div class="container">
            <a href="index.php">Главная</a> > <span>Каталог товаров</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container catalog-page">
        <h1>Каталог бытовой техники</h1>
        
        <div class="catalog-layout">
            <!-- Боковая панель с фильтрами -->
            <aside class="filters-sidebar">
                <div class="filter-section">
                    <h3>Категории</h3>
                    <ul class="category-filter">
                        <li><a href="#" data-category="all" class="active">Все товары</a></li>
                        <li><a href="#" data-category="1">Холодильники</a></li>
                        <li><a href="#" data-category="2">Стиральные машины</a></li>
                        <li><a href="#" data-category="3">Телевизоры</a></li>
                        <li><a href="#" data-category="4">Кухонная техника</a></li>
                        <li><a href="#" data-category="5">Климатическая техника</a></li>
                        <li><a href="#" data-category="6">Мелкая техника</a></li>
                    </ul>
                </div>
                
                <div class="filter-section">
                    <h3>Цена, ₽</h3>
                    <div class="price-filter">
                        <div class="price-inputs">
                            <input type="number" id="min-price" placeholder="0" min="0">
                            <span>-</span>
                            <input type="number" id="max-price" placeholder="500000" min="0">
                        </div>
                        <button id="apply-price-filter">Применить</button>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3>Бренды</h3>
                    <div class="brand-filter">
                        <label><input type="checkbox" value="samsung"> Samsung</label>
                        <label><input type="checkbox" value="lg"> LG</label>
                        <label><input type="checkbox" value="bosch"> Bosch</label>
                        <label><input type="checkbox" value="sony"> Sony</label>
                        <label><input type="checkbox" value="philips"> Philips</label>
                        <label><input type="checkbox" value="indesit"> Indesit</label>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3>Наличие</h3>
                    <div class="stock-filter">
                        <label><input type="checkbox" value="in-stock" checked> В наличии</label>
                        <label><input type="checkbox" value="pre-order"> Под заказ</label>
                    </div>
                </div>
                
                <button id="reset-filters" class="btn btn-outline">Сбросить фильтры</button>
            </aside>
            
            <!-- Основная область с товарами -->
            <section class="products-area">
                <div class="products-header">
                    <div class="sorting-options">
                        <label>Сортировка:</label>
                        <select id="sort-select">
                            <option value="popular">По популярности</option>
                            <option value="price-asc">По цене (возрастание)</option>
                            <option value="price-desc">По цене (убывание)</option>
                            <option value="name">По названию</option>
                            <option value="newest">Сначала новинки</option>
                        </select>
                    </div>
                    
                    <div class="view-options">
                        <button id="grid-view" class="active"><i class="fas fa-th"></i></button>
                        <button id="list-view"><i class="fas fa-list"></i></button>
                    </div>
                </div>
                
                <div class="products-count">
                    Найдено товаров: <span id="products-found">0</span>
                </div>
                
                <div class="products-grid" id="products-container">
                    <!-- Товары будут загружены через JavaScript -->
                </div>
                
                <div class="pagination" id="pagination">
                    <!-- Пагинация будет создана через JavaScript -->
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>ТехноДомъ</h3>
                    <p>Интернет-магазин бытовой техники с 2010 года.</p>
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
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 ТехноДомъ. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script src="js/products-data.js"></script>
    <script src="js/catalog.js"></script>
    <script src="js/main.js"></script>
</body>
</html>