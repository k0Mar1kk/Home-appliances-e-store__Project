<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата - ТехноДомъ</title>
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
                        <li><a href="delivery.php"><i class="fas fa-truck"></i> Доставка</a></li>
                        <li><a href="payment.php" class="active"><i class="fas fa-credit-card"></i> Оплата</a></li>
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
            <a href="index.php">Главная</a> > <span>Оплата</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container">
        <h1>Способы оплаты</h1>
        
        <div class="payment-content">
            <div class="payment-section">
                <h2><i class="fas fa-money-bill-wave"></i> Наличными</h2>
                <div class="payment-option">
                    <h3>При получении заказа</h3>
                    <ul>
                        <li>Оплата наличными курьеру при доставке</li>
                        <li>Предоставляется кассовый чек</li>
                        <li>Возможность проверить товар перед оплатой</li>
                        <li>Подходит для всех регионов доставки</li>
                    </ul>
                </div>
                
                <div class="payment-option">
                    <h3>В магазине при самовывозе</h3>
                    <ul>
                        <li>Оплата на кассе магазина</li>
                        <li>Работаем с наличными и банковскими картами</li>
                        <li>Возможность осмотреть товар перед покупкой</li>
                    </ul>
                </div>
            </div>
            
            <div class="payment-section">
                <h2><i class="fas fa-credit-card"></i> Банковской картой</h2>
                <div class="payment-cards">
                    <div class="cards-accepted">
                        <img src="images/visa.png" alt="Visa">
                        <img src="images/mastercard.png" alt="MasterCard">
                        <img src="images/mir.png" alt="Мир">
                    </div>
                    
                    <div class="payment-option">
                        <h3>Онлайн оплата на сайте</h3>
                        <ul>
                            <li>Безопасная оплата через защищенное соединение</li>
                            <li>Мгновенное подтверждение оплаты</li>
                            <li>Поддержка 3D-Secure</li>
                            <li>Возврат средств при отмене заказа</li>
                        </ul>
                        <div class="security-note">
                            <i class="fas fa-lock"></i>
                            <span>Все операции защищены по стандарту PCI DSS</span>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <h3>Оплата картой курьеру</h3>
                        <ul>
                            <li>Возможность оплаты картой при получении</li>
                            <li>Используем мобильный терминал</li>
                            <li>Поддержка бесконтактных платежей (PayPass, PayWave)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="payment-section">
                <h2><i class="fas fa-chart-line"></i> Рассрочка и кредит</h2>
                <div class="credit-options">
                    <div class="credit-option">
                        <h3>Рассрочка от магазина</h3>
                        <ul>
                            <li><strong>Срок:</strong> 3, 6 или 12 месяцев</li>
                            <li><strong>Первоначальный взнос:</strong> 0%</li>
                            <li><strong>Переплата:</strong> 0%</li>
                            <li>Для товаров от 10 000 ₽</li>
                            <li>Требуется только паспорт</li>
                        </ul>
                    </div>
                    
                    <div class="credit-option">
                        <h3>Кредит от банков-партнеров</h3>
                        <ul>
                            <li><strong>Банки:</strong> Сбербанк, ВТБ, Т-банк, Альфа-Банк</li>
                            <li><strong>Ставка:</strong> от 8.9% годовых</li>
                            <li><strong>Срок:</strong> до 36 месяцев</li>
                            <li>Решение за 15 минут</li>
                            <li>Оформление в магазине или онлайн</li>
                        </ul>
                    </div>
                </div>
                
                <div class="credit-conditions">
                    <h3>Условия получения рассрочки/кредита:</h3>
                    <ol>
                        <li>Возраст от 18 лет</li>
                        <li>Постоянная регистрация в РФ</li>
                        <li>Паспорт гражданина РФ</li>
                        <li>Для кредита может потребоваться справка о доходах</li>
                    </ol>
                </div>
            </div>
            
            <div class="payment-section">
                <h2><i class="fas fa-exchange-alt"></i> Возврат средств</h2>
                <div class="refund-info">
                    <h3>Условия возврата:</h3>
                    <ul>
                        <li>Возврат в течение 14 дней с момента покупки</li>
                        <li>Товар должен сохранить товарный вид</li>
                        <li>Наличие чека или другого подтверждения покупки</li>
                        <li>Отсутствие следов эксплуатации</li>
                    </ul>
                    
                    <h3>Сроки возврата денежных средств:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Способ оплаты</th>
                                <th>Срок возврата</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Наличные</td>
                                <td>В день обращения</td>
                            </tr>
                            <tr>
                                <td>Банковская карта</td>
                                <td>3-10 рабочих дней</td>
                            </tr>
                            <tr>
                                <td>Онлайн оплата</td>
                                <td>5-7 рабочих дней</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="payment-section">
                <h2><i class="fas fa-question-circle"></i> Частые вопросы</h2>
                <div class="faq">
                    <div class="faq-item">
                        <h3>Безопасно ли оплачивать заказ картой на сайте?</h3>
                        <p>Да, все платежи защищены по стандарту PCI DSS. Мы не храним данные вашей карты.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h3>Можно ли оплатить заказ частично?</h3>
                        <p>Да, при оформлении заказа вы можете внести предоплату от 10% стоимости.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h3>Какие документы я получу при оплате?</h3>
                        <p>При любой форме оплаты вы получаете кассовый чек и товарную накладную.</p>
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