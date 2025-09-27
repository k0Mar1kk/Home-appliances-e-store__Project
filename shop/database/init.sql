-- Создание базы данных для интернет-магазина бытовой техники "ТехноДомъ"
CREATE DATABASE IF NOT EXISTS tech_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tech_store;

-- Таблица категорий товаров
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    parent_id INT NULL,
    description TEXT,
    image_url VARCHAR(255),
    icon_class VARCHAR(50) DEFAULT 'fas fa-box',
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Таблица производителей
CREATE TABLE manufacturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    country VARCHAR(50),
    website VARCHAR(255),
    logo_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица товаров
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    short_description VARCHAR(500),
    price DECIMAL(10, 2) NOT NULL,
    old_price DECIMAL(10, 2) NULL,
    category_id INT NOT NULL,
    manufacturer_id INT NOT NULL,
    sku VARCHAR(50) UNIQUE NOT NULL,
    stock_quantity INT DEFAULT 0,
    reserved_quantity INT DEFAULT 0,
    weight DECIMAL(8, 2),
    dimensions VARCHAR(100),
    warranty_months INT,
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    main_image_url VARCHAR(255),
    video_url VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT,
    FOREIGN KEY (manufacturer_id) REFERENCES manufacturers(id) ON DELETE RESTRICT
);

-- Таблица изображений товаров
CREATE TABLE product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255),
    sort_order INT DEFAULT 0,
    is_main BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Таблица характеристик
CREATE TABLE attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    unit VARCHAR(20),
    filterable BOOLEAN DEFAULT FALSE,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица значений характеристик товаров
CREATE TABLE product_attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    attribute_id INT NOT NULL,
    value VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (attribute_id) REFERENCES attributes(id) ON DELETE CASCADE,
    UNIQUE KEY unique_product_attribute (product_id, attribute_id)
);

-- Таблица пользователей
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20),
    avatar_url VARCHAR(255),
    date_of_birth DATE,
    is_admin BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    email_verified BOOLEAN DEFAULT FALSE,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Таблица адресов пользователей
CREATE TABLE user_addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    address_type ENUM('home', 'work', 'other') DEFAULT 'home',
    address_line1 VARCHAR(255) NOT NULL,
    address_line2 VARCHAR(255),
    city VARCHAR(100) NOT NULL,
    region VARCHAR(100),
    postal_code VARCHAR(20) NOT NULL,
    country VARCHAR(50) DEFAULT 'Россия',
    is_default BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Таблица заказов
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(20) UNIQUE NOT NULL,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    discount_amount DECIMAL(10, 2) DEFAULT 0,
    final_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded') DEFAULT 'pending',
    shipping_address_id INT NOT NULL,
    shipping_method VARCHAR(100),
    shipping_cost DECIMAL(10, 2) DEFAULT 0,
    payment_method ENUM('card', 'cash', 'online', 'installment'),
    payment_status ENUM('pending', 'paid', 'failed', 'refunded') DEFAULT 'pending',
    tracking_number VARCHAR(100),
    customer_notes TEXT,
    admin_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY (shipping_address_id) REFERENCES user_addresses(id) ON DELETE RESTRICT
);

-- Таблица элементов заказа
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

-- Таблица отзывов о товарах
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    title VARCHAR(255),
    comment TEXT,
    is_approved BOOLEAN DEFAULT FALSE,
    is_verified_purchase BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Таблица промо-акций и скидок
CREATE TABLE promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    discount_type ENUM('percentage', 'fixed', 'free_shipping'),
    discount_value DECIMAL(10, 2) NOT NULL,
    min_order_amount DECIMAL(10, 2) DEFAULT 0,
    usage_limit INT DEFAULT NULL,
    used_count INT DEFAULT 0,
    start_date TIMESTAMP NOT NULL,
    end_date TIMESTAMP NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица применения промо-акций к товарам
CREATE TABLE product_promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    promotion_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (promotion_id) REFERENCES promotions(id) ON DELETE CASCADE
);

-- Таблица купонов
CREATE TABLE coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) UNIQUE NOT NULL,
    promotion_id INT NOT NULL,
    usage_limit INT DEFAULT 1,
    used_count INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (promotion_id) REFERENCES promotions(id) ON DELETE CASCADE
);

-- Таблица использованных купонов
CREATE TABLE used_coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_id INT NOT NULL,
    user_id INT NOT NULL,
    order_id INT NOT NULL,
    used_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (coupon_id) REFERENCES coupons(id) ON DELETE RESTRICT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE RESTRICT
);

-- Таблица wishlist (избранное)
CREATE TABLE wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_product (user_id, product_id)
);

-- Таблица просмотров товаров (для аналитики)
CREATE TABLE product_views (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NULL,
    ip_address VARCHAR(45),
    viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Таблица обратной связи (контакты)
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new',
    admin_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Таблица настроек сайта
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    setting_type ENUM('text', 'number', 'boolean', 'json') DEFAULT 'text',
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Вставка демо-данных

-- Категории товаров
INSERT INTO categories (name, parent_id, description, icon_class, sort_order) VALUES
('Крупная бытовая техника', NULL, 'Холодильники, стиральные машины, плиты и другая крупная техника', 'fas fa-cube', 1),
('Холодильники', 1, 'Однокамерные, двухкамерные, side-by-side холодильники', 'fas fa-ice-cream', 1),
('Стиральные машины', 1, 'Автоматические стиральные машины', 'fas fa-tshirt', 2),
('Варочные панели', 1, 'Газовые, электрические и индукционные варочные панели', 'fas fa-fire', 3),
('Мелкая бытовая техника', NULL, 'Небольшие приборы для кухни и дома', 'fas fa-blender', 2),
('Кухонные комбайны', 5, 'Многофункциональные кухонные комбайны', 'fas fa-utensils', 1),
('Кофемашины', 5, 'Капельные, рожковые и капсульные кофемашины', 'fas fa-coffee', 2),
('Телевизоры и аудио', NULL, 'Телевизоры, аудиосистемы и аксессуары', 'fas fa-tv', 3),
('Телевизоры', 8, 'LED, OLED, QLED телевизоры', 'fas fa-tv', 1),
('Акустические системы', 8, 'Колонки, саундбары и домашние кинотеатры', 'fas fa-volume-up', 2),
('Климатическая техника', NULL, 'Кондиционеры, обогреватели, увлажнители', 'fas fa-wind', 4),
('Кондиционеры', 11, 'Сплит-системы, мобильные кондиционеры', 'fas fa-snowflake', 1);

-- Производители
INSERT INTO manufacturers (name, country, description, website) VALUES
('Samsung', 'Южная Корея', 'Ведущий производитель электроники и бытовой техники', 'https://www.samsung.com'),
('LG', 'Южная Корея', 'Крупный производитель бытовой техники и электроники', 'https://www.lg.com'),
('Bosch', 'Германия', 'Немецкий производитель качественной бытовой техники', 'https://www.bosch-home.com'),
('Indesit', 'Италия', 'Итальянский производитель доступной бытовой техники', 'https://www.indesit.com'),
('Philips', 'Нидерланды', 'Производитель мелкой бытовой техники и электроники', 'https://www.philips.ru'),
('Sony', 'Япония', 'Производитель электроники, телевизоров и аудиотехники', 'https://www.sony.ru'),
('Ballu', 'Россия', 'Производитель климатической техники', 'https://www.ballu.ru'),
('Xiaomi', 'Китай', 'Производитель электроники и умной техники', 'https://www.mi.com');

-- Товары
INSERT INTO products (name, description, short_description, price, old_price, category_id, manufacturer_id, sku, stock_quantity, weight, warranty_months, is_featured) VALUES
('Холодильник Samsung RB37', 'Двухкамерный холодильник с системой No Frost. Идеальное решение для современной кухни с большим объемом и энергоэффективностью.', 'Двухкамерный холодильник с No Frost, 367 л', 54990.00, 59990.00, 2, 1, 'SAMS-RB37', 15, 78.5, 36, TRUE),
('Стиральная машина LG F2J6', 'Автоматическая стиральная машина с функцией сушки. Тихая работа, большой набор программ и интеллектуальное управление.', 'Стиральная машина с сушкой, загрузка 9 кг', 42990.00, NULL, 3, 2, 'LG-F2J6', 8, 65.0, 24, TRUE),
('Варочная панель Bosch PKE645', 'Индукционная варочная панель с 4 конфорками. Быстрый нагрев, точный контроль температуры и безопасность использования.', 'Индукционная варочная панель, 4 зоны', 28990.00, 31990.00, 4, 3, 'BOS-PKE645', 12, 12.3, 24, FALSE),
('Кухонный комбайн Philips HR7755', 'Многофункциональный кухонный комбайн с мощным двигателем. Подходит для нарезки, измельчения, замеса теста и взбивания.', 'Многофункциональный кухонный комбайн, 1000 Вт', 12990.00, NULL, 6, 5, 'PHI-HR7755', 20, 5.2, 12, TRUE),
('Кофемашина Bosch TAS series', 'Капсульная кофемашина для приготовления 4 видов напитков. Компактный дизайн, быстрый нагрев и простота в использовании.', 'Капсульная кофемашина, 4 вида напитков', 19990.00, 21990.00, 7, 3, 'BOS-TAS', 10, 4.8, 12, TRUE),
('Телевизор Sony X80J 55"', '4K LED телевизор с платформой Android TV. Яркая картинка, умные функции и богатый выбор приложений для развлечений.', '4K LED телевизор, 55 дюймов, Android TV', 69990.00, NULL, 9, 6, 'SON-X80J55', 7, 18.2, 24, TRUE),
('Саундбар Samsung HW-Q600A', 'Саундбар с беспроводным сабвуфером и поддержкой Dolby Atmos. Объемный звук для полного погружения в фильмы и музыку.', 'Саундбар с сабвуфером, Dolby Atmos', 34990.00, 39990.00, 10, 1, 'SAMS-HWQ600A', 9, 12.5, 12, FALSE),
('Кондиционер Ballu BSEP-07HN1', 'Инверторный кондиционер с Wi-Fi управлением. Экономичное энергопотребление, тихая работа и возможность удаленного контроля.', 'Инверторный кондиционер, 7000 BTU', 32990.00, 35990.00, 12, 7, 'BAL-BSEP07', 5, 25.0, 36, TRUE),
('Микроволновка LG MS3235GIS', 'Микроволновая печь с функцией гриля и большим объемом. Автоматические программы приготовления и удобное сенсорное управление.', 'Микроволновая печь с грилем, 32 л', 8490.00, 9990.00, 5, 2, 'LG-MS3235', 25, 15.8, 12, FALSE),
('Пылесос Philips PowerPro', 'Мощный пылесос с контейнером для пыли и HEPA фильтром. Эффективная уборка без потери мощности всасывания.', 'Мощный пылесос с контейнером для пыли', 12990.00, NULL, 5, 5, 'PHI-POWERPRO', 18, 6.2, 24, FALSE);

-- Характеристики
INSERT INTO attributes (name, unit, filterable, sort_order) VALUES
('Цвет', NULL, TRUE, 1),
('Мощность', 'Вт', TRUE, 2),
('Энергопотребление', NULL, TRUE, 3),
('Вес', 'кг', FALSE, 10),
('Габариты (ШxВxГ)', 'см', FALSE, 11),
('Объем холодильной камеры', 'л', TRUE, 4),
('Объем морозильной камеры', 'л', TRUE, 5),
('Загрузка белья', 'кг', TRUE, 6),
('Количество программ', NULL, TRUE, 7),
('Тип дисплея', NULL, TRUE, 8),
('Диагональ экрана', 'дюймов', TRUE, 9),
('Разрешение экрана', NULL, TRUE, 10),
('Тип компрессора', NULL, TRUE, 12),
('Уровень шума', 'дБ', TRUE, 13),
('Тип управления', NULL, TRUE, 14),
('Материал корпуса', NULL, TRUE, 15);

-- Характеристики товаров
INSERT INTO product_attributes (product_id, attribute_id, value) VALUES
(1, 1, 'Нержавеющая сталь'), (1, 3, 'A+'), (1, 6, '272'), (1, 7, '95'), (1, 13, 'Инверторный'), (1, 14, '38'),
(2, 1, 'Белый'), (2, 3, 'A++'), (2, 8, '9'), (2, 9, '14'), (2, 14, '52'), (2, 15, 'Металл'),
(3, 1, 'Черное стекло'), (3, 2, '7400'), (3, 3, 'A'), (3, 15, 'Стеклокерамика'),
(4, 1, 'Серебристый'), (4, 2, '1000'), (4, 9, '21'), (4, 15, 'Пластик'),
(5, 1, 'Черный'), (5, 2, '1500'), (5, 15, 'Пластик/металл'),
(6, 1, 'Черный'), (6, 10, 'LED'), (6, 11, '55'), (6, 12, '3840x2160 (4K)'), (6, 15, 'Пластик'),
(7, 1, 'Черный'), (7, 2, '360'), (7, 15, 'Металлическая сетка'),
(8, 1, 'Белый'), (8, 2, '850'), (8, 14, '22'), (8, 15, 'Пластик'),
(9, 1, 'Нержавеющая сталь'), (9, 2, '900'), (9, 5, '52x31x41'), (9, 15, 'Нержавеющая сталь'),
(10, 1, 'Синий'), (10, 2, '650'), (10, 8, '2.5'), (10, 15, 'Пластик');

-- Пользователи
INSERT INTO users (email, password, first_name, last_name, phone, is_admin, email_verified) VALUES
('admin@techstore.ru', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Админ', 'Админов', '+79161234567', TRUE, TRUE),
('ivanov@mail.ru', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Иван', 'Иванов', '+79161234568', FALSE, TRUE),
('petrova@mail.ru', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Мария', 'Петрова', '+79161234569', FALSE, TRUE),
('sidorov@mail.ru', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Алексей', 'Сидоров', '+79161234570', FALSE, TRUE);

-- Адреса пользователей
INSERT INTO user_addresses (user_id, address_type, address_line1, address_line2, city, postal_code, is_default) VALUES
(2, 'home', 'ул. Ленина, д. 15', 'кв. 42', 'Москва', '101000', TRUE),
(3, 'home', 'пр. Мира, д. 28', 'кв. 13', 'Санкт-Петербург', '190000', TRUE),
(4, 'home', 'ул. Садовая, д. 7', 'кв. 84', 'Казань', '420000', TRUE);

-- Заказы
INSERT INTO orders (order_number, user_id, total_amount, discount_amount, final_amount, status, shipping_address_id, shipping_method, shipping_cost, payment_method, payment_status) VALUES
('TS-2024-001', 2, 97980.00, 500.00, 97480.00, 'delivered', 1, 'courier', 500.00, 'card', 'paid'),
('TS-2024-002', 3, 42990.00, 0.00, 42990.00, 'processing', 2, 'pickup', 0.00, 'online', 'paid'),
('TS-2024-003', 4, 56470.00, 1000.00, 55470.00, 'shipped', 3, 'courier', 500.00, 'cash', 'paid');

-- Элементы заказов
INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity, total_price) VALUES
(1, 1, 'Холодильник Samsung RB37', 54990.00, 1, 54990.00),
(1, 4, 'Кухонный комбайн Philips HR7755', 12990.00, 1, 12990.00),
(1, 5, 'Кофемашина Bosch TAS series', 19990.00, 1, 19990.00),
(2, 2, 'Стиральная машина LG F2J6', 42990.00, 1, 42990.00),
(3, 9, 'Микроволновка LG MS3235GIS', 8490.00, 1, 8490.00),
(3, 10, 'Пылесос Philips PowerPro', 12990.00, 1, 12990.00),
(3, 7, 'Саундбар Samsung HW-Q600A', 34990.00, 1, 34990.00);

-- Отзывы
INSERT INTO reviews (product_id, user_id, rating, title, comment, is_approved, is_verified_purchase) VALUES
(1, 2, 5, 'Отличный холодильник!', 'Пользуюсь уже месяц, очень тихий и функциональный. No Frost действительно работает! Хватает места для семьи из 4 человек.', TRUE, TRUE),
(4, 2, 4, 'Хороший комбайн', 'Мощный, справляется со всеми задачами. Ножи острые, легко моется. Минус - немного шумный на максимальных оборотах.', TRUE, TRUE),
(2, 3, 3, 'Нормальная машинка', 'Стирает хорошо, но немного шумит при отжиме. В целом доволен покупкой, но ожидал более тихой работы.', TRUE, TRUE),
(9, 4, 5, 'Отличная микроволновка', 'Гриль работает отлично, большая камера, удобное управление. Покупкой доволен, рекомендую!', TRUE, TRUE);

-- Промо-акции
INSERT INTO promotions (name, description, discount_type, discount_value, min_order_amount, start_date, end_date) VALUES
('Летняя распродажа', 'Скидки на крупную технику', 'percentage', 15.00, 20000.00, '2024-06-01 00:00:00', '2024-08-31 23:59:59'),
('Скидка на кофемашины', 'Специальное предложение на кофемашины Bosch', 'fixed', 2000.00, 0.00, '2024-07-01 00:00:00', '2024-07-31 23:59:59'),
('Новогодние скидки', 'Скидки на всю технику', 'percentage', 10.00, 10000.00, '2024-12-15 00:00:00', '2024-12-31 23:59:59'),
('Бесплатная доставка', 'Бесплатная доставка при заказе от 20000 рублей', 'free_shipping', 0.00, 20000.00, '2024-01-01 00:00:00', '2024-12-31 23:59:59');

-- Применение промо-акций
INSERT INTO product_promotions (product_id, promotion_id) VALUES
(1, 1), (2, 1), (3, 1), (5, 2), (6, 3), (7, 3), (8, 3);

-- Купоны
INSERT INTO coupons (code, promotion_id, usage_limit) VALUES
('SUMMER2024', 1, 100),
('COFFEE500', 2, 50),
('NEWYEAR10', 3, 200),
('FREESHIP', 4, NULL);

-- Сообщения обратной связи
INSERT INTO contact_messages (name, email, phone, subject, message, status) VALUES
('Дмитрий Семенов', 'semenov@mail.ru', '+79167778899', 'Вопрос о доставке', 'Здравствуйте! Интересует возможность доставки в Подмосковье. Какие сроки и стоимость?', 'replied'),
('Ольга Козлова', 'kozlovа@mail.ru', '+79165554433', 'Гарантия на товар', 'Добрый день! Хочу уточнить условия гарантии на холодильник Samsung. Спасибо!', 'read');

-- Настройки сайта
INSERT INTO settings (setting_key, setting_value, setting_type, description) VALUES
('site_name', 'ТехноДом', 'text', 'Название сайта'),
('site_email', 'info@tehnodom.ru', 'text', 'Основной email сайта'),
('phone_number', '+7 (495) 123-45-67', 'text', 'Основной телефон'),
('free_shipping_min', '20000', 'number', 'Минимальная сумма для бесплатной доставки'),
('shipping_cost', '500', 'number', 'Стоимость доставки'),
('currency', 'RUB', 'text', 'Валюта'),
('products_per_page', '12', 'number', 'Количество товаров на странице');

-- Создание индексов для оптимизации
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_products_manufacturer ON products(manufacturer_id);
CREATE INDEX idx_products_price ON products(price);
CREATE INDEX idx_products_active ON products(is_active);
CREATE INDEX idx_products_featured ON products(is_featured);
CREATE INDEX idx_orders_user ON orders(user_id);
CREATE INDEX idx_orders_status ON orders(status);
CREATE INDEX idx_orders_date ON orders(order_date);
CREATE INDEX idx_order_items_order ON order_items(order_id);
CREATE INDEX idx_order_items_product ON order_items(product_id);
CREATE INDEX idx_reviews_product ON reviews(product_id);
CREATE INDEX idx_reviews_approved ON reviews(is_approved);
CREATE INDEX idx_promotions_active ON promotions(is_active);
CREATE INDEX idx_promotions_dates ON promotions(start_date, end_date);

-- Создание пользователя для приложения
CREATE USER IF NOT EXISTS 'tech_store_user'@'localhost' IDENTIFIED BY 'secure_password_123';
GRANT SELECT, INSERT, UPDATE, DELETE ON tech_store.* TO 'tech_store_user'@'localhost';
FLUSH PRIVILEGES;

-- Создание представлений для удобства

-- Представление для товаров с детальной информацией
CREATE VIEW product_details AS
SELECT 
    p.*,
    c.name as category_name,
    m.name as manufacturer_name,
    m.country as manufacturer_country
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
LEFT JOIN manufacturers m ON p.manufacturer_id = m.id
WHERE p.is_active = TRUE;

-- Представление для заказов с полной информацией
CREATE VIEW order_details AS
SELECT 
    o.*,
    u.first_name,
    u.last_name,
    u.email,
    u.phone,
    CONCAT(ua.address_line1, ', ', ua.city, ', ', ua.postal_code) as shipping_address
FROM orders o
LEFT JOIN users u ON o.user_id = u.id
LEFT JOIN user_addresses ua ON o.shipping_address_id = ua.id;

-- Сообщение об успешном создании
SELECT '✅ База данных "tech_store" успешно создана и наполнена демо-данными!' as message;
SELECT '📊 Статистика:' as info;
SELECT 
    (SELECT COUNT(*) FROM categories) as 'Категории',
    (SELECT COUNT(*) FROM products) as 'Товары',
    (SELECT COUNT(*) FROM users) as 'Пользователи',
    (SELECT COUNT(*) FROM orders) as 'Заказы';