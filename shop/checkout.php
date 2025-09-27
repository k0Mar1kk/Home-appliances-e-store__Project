<!DOCTYPE php>
<php lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа - ТехноДомъ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <header>...</header>

    
    <section class="breadcrumbs">
        <div class="container">
            <a href="index.php">Главная</a> > 
            <a href="cart.php">Корзина</a> > 
            <span>Оформление заказа</span>
        </div>
    </section>

    <!-- Основное содержимое -->
    <main class="container">
        <h1>Оформление заказа</h1>
        
        <form class="checkout-form" id="checkout-form">
            <div class="checkout-content">
                <div class="checkout-steps">
                    <div class="step active" data-step="1">
                        <span class="step-number">1</span>
                        <span class="step-title">Данные покупателя</span>
                    </div>
                    <div class="step" data-step="2">
                        <span class="step-number">2</span>
                        <span class="step-title">Доставка</span>
                    </div>
                    <div class="step" data-step="3">
                        <span class="step-number">3</span>
                        <span class="step-title">Оплата</span>
                    </div>
                </div>
                
                <!-- Шаг 1: Данные покупателя -->
                <div class="checkout-step active" id="step-1">
                    <h3>Контактная информация</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullname">ФИО *</label>
                            <input type="text" id="fullname" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary next-step" data-next="2">Продолжить</button>
                </div>
                
                <!-- Доставка -->
                <div class="checkout-step" id="step-2">
                    <h3>Способ доставки</h3>
                    <div class="delivery-options">
                        <label class="delivery-option">
                            <input type="radio" name="delivery" value="courier" checked>
                            <div class="option-content">
                                <h4>Курьерская доставка</h4>
                                <p>Доставка в течение 1-2 дней</p>
                                <span class="price">500 ₽</span>
                            </div>
                        </label>
                        
                        <label class="delivery-option">
                            <input type="radio" name="delivery" value="pickup">
                            <div class="option-content">
                                <h4>Самовывоз</h4>
                                <p>Москва, ул. Техническая, 15</p>
                                <span class="price">Бесплатно</span>
                            </div>
                        </label>
                    </div>
                    
                    <div class="delivery-address">
                        <h4>Адрес доставки</h4>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="city">Город *</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес *</label>
                                <textarea id="address" name="address" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-outline prev-step" data-prev="1">Назад</button>
                    <button type="button" class="btn btn-primary next-step" data-next="3">Продолжить</button>
                </div>
                
                <!-- Оплата -->
                <div class="checkout-step" id="step-3">
                    <h3>Способ оплаты</h3>
                    <div class="payment-options">
                        <label class="payment-option">
                            <input type="radio" name="payment" value="card" checked>
                            <div class="option-content">
                                <h4>Банковской картой</h4>
                                <p>Оплата онлайн</p>
                            </div>
                        </label>
                        
                        <label class="payment-option">
                            <input type="radio" name="payment" value="cash">
                            <div class="option-content">
                                <h4>Наличными при получении</h4>
                                <p>Курьеру или в пункте выдачи</p>
                            </div>
                        </label>
                    </div>
                    
                    <div class="order-summary">
                        <h4>Ваш заказ</h4>
                        <div class="summary-items" id="order-items">
                            <!-- Товары из корзины -->
                        </div>
                        <div class="summary-total">
                            <div class="total-row">
                                <span>Товары:</span>
                                <span id="summary-subtotal">0 ₽</span>
                            </div>
                            <div class="total-row">
                                <span>Доставка:</span>
                                <span id="summary-shipping">0 ₽</span>
                            </div>
                            <div class="total-row final">
                                <span>Итого:</span>
                                <span id="summary-total">0 ₽</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-agreement">
                        <label>
                            <input type="checkbox" required>
                            Я согласен с <a href="#">условиями обработки персональных данных</a>
                        </label>
                    </div>
                    
                    <button type="button" class="btn btn-outline prev-step" data-prev="2">Назад</button>
                    <button type="submit" class="btn btn-primary">Оформить заказ</button>
                </div>
            </div>
        </form>
    </main>

        <footer>...</footer>

    <script src="js/checkout.js"></script>
</body>
</html>