<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'ТехноДомъ - Магазин бытовой техники'; ?></title>
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
                        <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"><i class="fas fa-home"></i> Главная</a></li>
                        <li><a href="catalog.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catalog.php' ? 'active' : ''; ?>"><i class="fas fa-th-large"></i> Каталог</a></li>
                        <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>"><i class="fas fa-info-circle"></i> О нас</a></li>
                        <li><a href="delivery.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'delivery.php' ? 'active' : ''; ?>"><i class="fas fa-truck"></i> Доставка</a></li>
                        <li><a href="payment.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'payment.php' ? 'active' : ''; ?>"><i class="fas fa-credit-card"></i> Оплата</a></li>
                        <li><a href="contacts.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contacts.php' ? 'active' : ''; ?>"><i class="fas fa-envelope"></i> Контакты</a></li>
                    </ul>
                </nav>
                
                <div class="header-actions">
                    <div class="search-box">
                        <form action="catalog.php" method="GET">
                            <input type="text" name="q" placeholder="Поиск техники...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="cart-icon">
                        <a href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>