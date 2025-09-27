<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> О компании - ТехноДомъ </title>
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
                        <li><a href="payment.php"><i class="fas fa-credit-card"></i> Оплата</a></li>
                        <li><a href="about.php" class="active"><i class="fas fa-info-circle"></i> О нас</a></li>
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
            <a href="index.php">Главная</a> > <span>О компании</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container">
        <section class="about-hero">
            <div class="about-hero-content">
                <h1>О компании ТехноДомъ</h1>
                <p class="lead">Более 10 лет мы помогаем создавать уют и комфорт в вашем доме с помощью качественной бытовой техники</p>
            </div>
        </section>

        <section class="about-story">
            <div class="about-story-content">
                <div class="story-text">
                    <h2>Наша история</h2>
                    <p>Компания <strong>ТехноДомъ</strong> была основана в 2010 году с целью сделать качественную бытовую технику доступной для каждой семьи. Начиная с небольшого магазина в Москве, мы выросли в крупный интернет-магазин, обслуживающий клиентов по всей России.</p>
                    
                    <div class="milestones">
                        <div class="milestone">
                            <div class="milestone-year">2010</div>
                            <div class="milestone-text">Открытие первого магазина в Москве</div>
                        </div>
                        <div class="milestone">
                            <div class="milestone-year">2013</div>
                            <div class="milestone-text">Запуск интернет-магазина</div>
                        </div>
                        <div class="milestone">
                            <div class="milestone-year">2016</div>
                            <div class="milestone-text">Расширение ассортимента до 1000+ товаров</div>
                        </div>
                        <div class="milestone">
                            <div class="milestone-year">2020</div>
                            <div class="milestone-text">Запуск собственной службы доставки</div>
                        </div>
                        <div class="milestone">
                            <div class="milestone-year">2023</div>
                            <div class="milestone-text">Более 50 000 довольных клиентов</div>
                        </div>
                    </div>
                </div>
                <div class="story-image">
                    <img src="images/about/store.jpg" alt="Наш магазин" onerror="this.src='images/no-image.jpg'">
                </div>
            </div>
        </section>

        <section class="about-mission">
            <div class="mission-cards">
                <div class="mission-card">
                    <i class="fas fa-bullseye"></i>
                    <h3>Наша миссия</h3>
                    <p>Сделать жизнь наших клиентов комфортнее с помощью надежной и современной бытовой техники, предоставляя лучший сервис и выгодные условия покупки.</p>
                </div>
                
                <div class="mission-card">
                    <i class="fas fa-eye"></i>
                    <h3>Наше видение</h3>
                    <p>Стать лидером рынка бытовой техники в России, сохраняя высокие стандарты качества и развивая инновационные подходы к обслуживанию клиентов.</p>
                </div>
                
                <div class="mission-card">
                    <i class="fas fa-handshake"></i>
                    <h3>Наши ценности</h3>
                    <p>Честность, качество, ответственность и забота о клиентах - основные принципы, которые являются целью нашей работы.</p>
                </div>
            </div>
        </section>

        <section class="about-numbers">
            <h2>ТехноДомъ в цифрах</h2>
            <div class="numbers-grid">
                <div class="number-item">
                    <div class="number">10+</div>
                    <div class="number-label">лет на рынке</div>
                </div>
                <div class="number-item">
                    <div class="number">50 000+</div>
                    <div class="number-label">довольных клиентов</div>
                </div>
                <div class="number-item">
                    <div class="number">1000+</div>
                    <div class="number-label">товаров в каталоге</div>
                </div>
                <div class="number-item">
                    <div class="number">15</div>
                    <div class="number-label">брендов-партнеров</div>
                </div>
                <div class="number-item">
                    <div class="number">24/7</div>
                    <div class="number-label">поддержка клиентов</div>
                </div>
                <div class="number-item">
                    <div class="number">95%</div>
                    <div class="number-label">клиентов рекомендуют нас</div>
                </div>
            </div>
        </section>

        <section class="about-team">
            <h2>Наша команда</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="images/team/director.jpg" alt="Директор" onerror="this.src='images/no-image.jpg'">
                    </div>
                    <h3>Иван Петров</h3>
                    <p class="member-position">Генеральный директор</p>
                    <p class="member-bio">Основатель компании с 15-летним опытом в retail-продажах бытовой техники.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="images/team/manager.jpg" alt="Менеджер" onerror="this.src='images/no-image.jpg'">
                    </div>
                    <h3>Мария Сидорова</h3>
                    <p class="member-position">Менеджер по продажам</p>
                    <p class="member-bio">Профессиональный консультант с глубокими знаниями бытовой техники.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="images/team/tech.jpg" alt="Техник" onerror="this.src='images/no-image.jpg'">
                    </div>
                    <h3>Алексей Козлов</h3>
                    <p class="member-position">Технический специалист</p>
                    <p class="member-bio">Сертифицированный специалист по установке и ремонту техники.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="images/team/support.jpg" alt="Поддержка" onerror="this.src='images/no-image.jpg'">
                    </div>
                    <h3>Елена Николаева</h3>
                    <p class="member-position">Менеджер поддержки</p>
                    <p class="member-bio">Обеспечивает качественное обслуживание клиентов на всех этапах.</p>
                </div>
            </div>
        </section>

        <section class="about-partners">
            <h2>Наши партнеры</h2>
            <div class="partners-grid">
                <div class="partner-logo">
                    <img src="images/partners/samsung.png" alt="Samsung" onerror="this.src='images/no-image.jpg'">
                </div>
                <div class="partner-logo">
                    <img src="images/partners/lg.png" alt="LG" onerror="this.src='images/no-image.jpg'">
                </div>
                <div class="partner-logo">
                    <img src="images/partners/bosch.png" alt="Bosch" onerror="this.src='images/no-image.jpg'">
                </div>
                <div class="partner-logo">
                    <img src="images/partners/sony.png" alt="Sony" onerror="this.src='images/no-image.jpg'">
                </div>
                <div class="partner-logo">
                    <img src="images/partners/philips.png" alt="Philips" onerror="this.src='images/no-image.jpg'">
                </div>
                <div class="partner-logo">
                    <img src="images/partners/indesit.png" alt="Indesit" onerror="this.src='images/no-image.jpg'">
                </div>
            </div>
        </section>

        <section class="about-certificates">
            <h2>Лицензии и сертификаты</h2>
            <div class="certificates-content">
                <p>Мы работаем только с официальными поставщиками и имеем все необходимые лицензии:</p>
                <ul>
                    <li>Сертификат соответствия ГОСТ Р</li>
                    <li>Лицензия на розничную торговлю</li>
                    <li>Договоры с официальными дистрибьюторами</li>
                    <li>Сертификаты качества на всю продукцию</li>
                </ul>
            </div>
        </section>

        <section class="about-faq">
            <h2>Часто задаваемые вопросы</h2>
            <div class="faq-items">
                <div class="faq-item">
                    <h3>Как давно вы работаете на рынке?</h3>
                    <p>Компания ТехноДом успешно работает на рынке бытовой техники с 2010 года. За это время мы обслужили более 50 000 клиентов.</p>
                </div>
                
                <div class="faq-item">
                    <h3>Вы официальный дилер?</h3>
                    <p>Да, мы являемся официальным партнером ведущих производителей бытовой техники. Вся продукция поставляется с официальной гарантией.</p>
                </div>
                
                <div class="faq-item">
                    <h3>Предоставляете ли вы гарантию?</h3>
                    <p>На всю технику предоставляется официальная гарантия от производителя от 1 до 3 лет. Также мы оказываем сервисное обслуживание.</p>
                </div>
                
                <div class="faq-item">
                    <h3>Можно ли вернуть товар?</h3>
                    <p>Да, в соответствии с законодательством РФ, вы можете вернуть товар в течение 14 дней при сохранении товарного вида.</p>
                </div>
            </div>
        </section>

        <section class="about-cta">
            <div class="cta-content">
                <h2>Готовы сделать заказ?</h2>
                <p>Присоединяйтесь к тысячам довольных клиентов ТехноДомъ!</p>
                <div class="cta-buttons">
                    <a href="catalog.php" class="btn btn-primary">Перейти в каталог</a>
                    <a href="contacts.php" class="btn btn-secondary">Связаться с нами</a>
                </div>
            </div>
        </section>
    </main>

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
                        <li><a href="about.php">О нас</a></li>
                        <li><a href="contacts.php">Контакты</a></li>
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

    <script src="js/main.js"></script>
</body>
</php>