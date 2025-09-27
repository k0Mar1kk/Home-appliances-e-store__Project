<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доставка - ТехноДомъ</title>
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
                        <li><a href="catalog.php"><i class="fas fa-th-large"></i> Каталог</a></li>
                        <li><a href="delivery.php" class="active"><i class="fas fa-truck"></i> Доставка</a></li>
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

    <section class="breadcrumbs">
        <div class="container">
            <a href="index.php">Главная</a> > <span>Доставка</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container">
        <h1>Доставка техники</h1>
        
        <div class="delivery-content">
            <div class="delivery-section">
                <h2><i class="fas fa-truck"></i> Условия доставки</h2>
                <div class="delivery-options">
                    <div class="delivery-option">
                        <h3>Курьерская доставка по Москве</h3>
                        <ul>
                            <li><strong>Стоимость:</strong> 500 ₽ (бесплатно при заказе от 20 000 ₽)</li>
                            <li><strong>Сроки:</strong> 1-2 дня</li>
                            <li><strong>Время:</strong> с 9:00 до 21:00</li>
                            <li>Доставка до подъезда</li>
                            <li>Подъем на этаж +200 ₽ (бесплатно для техники до 5 кг)</li>
                        </ul>
                    </div>
                    
                    <div class="delivery-option">
                        <h3>Самовывоз из магазина</h3>
                        <ul>
                            <li><strong>Адрес:</strong> Москва, ул. Техническая, 15</li>
                            <li><strong>Время работы:</strong> Пн-Вс: 9:00-21:00</li>
                            <li>Бесплатно</li>
                            <li>Предварительная подготовка заказа</li>
                        </ul>
                    </div>
                    
                    <div class="delivery-option">
                        <h3>Доставка по России</h3>
                        <ul>
                            <li><strong>Транспортные компании:</strong> СДЭК, Boxberry</li>
                            <li><strong>Сроки:</strong> 3-10 дней в зависимости от региона</li>
                            <li><strong>Стоимость:</strong> рассчитывается индивидуально</li>
                            <li>Отправка в день заказа</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="delivery-section">
                <h2><i class="fas fa-clock"></i> График доставки</h2>
                <div class="schedule">
                    <table>
                        <thead>
                            <tr>
                                <th>День недели</th>
                                <th>Время доставки</th>
                                <th>Прием заказов до</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Понедельник - Пятница</td>
                                <td>10:00 - 20:00</td>
                                <td>18:00 предыдущего дня</td>
                            </tr>
                            <tr>
                                <td>Суббота</td>
                                <td>10:00 - 18:00</td>
                                <td>18:00 пятницы</td>
                            </tr>
                            <tr>
                                <td>Воскресенье</td>
                                <td>10:00 - 16:00</td>
                                <td>16:00 субботы</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="delivery-section">
                <h2><i class="fas fa-box-open"></i> Получение заказа</h2>
                <div class="receiving-info">
                    <h3>При курьерской доставке:</h3>
                    <ol>
                        <li>Проверьте целостность упаковки</li>
                        <li>Включите технику в присутствии курьера</li>
                        <li>Убедитесь в работоспособности</li>
                        <li>Подпишите акт приема-передачи</li>
                    </ol>
                    
                    <h3>Необходимые документы:</h3>
                    <ul>
                        <li>Паспорт для идентификации</li>
                        <li>Доверенность (если получает не заказчик)</li>
                    </ul>
                    
                    <div class="important-note">
                        <h4><i class="fas fa-exclamation-triangle"></i> Важно!</h4>
                        <p>При обнаружении повреждений или несоответствия заказу вы можете отказаться от получения товара. Курьер заберет его обратно для замены.</p>
                    </div>
                </div>
            </div>
            
            <div class="delivery-section">
                <h2><i class="fas fa-question-circle"></i> Частые вопросы</h2>
                <div class="faq">
                    <div class="faq-item">
                        <h3>Можно ли изменить время доставки?</h3>
                        <p>Да, за 2 часа до назначенного времени позвоните нам по телефону +7 (495) 123-45-67.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h3>Что делать, если меня нет дома в момент доставки?</h3>
                        <p>Курьер свяжется с вами и согласует новое время доставки. Возможна доставка в другой день.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h3>Осуществляете ли вы установку техники?</h3>
                        <p>Да, мы предлагаем услуги установки за дополнительную плату. Стоимость уточняйте у менеджера.</p>
                    </div>
                </div>
            </div>
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

    <script src="js/main.js"></script>
</body>
</html>