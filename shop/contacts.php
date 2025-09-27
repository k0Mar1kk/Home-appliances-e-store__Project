<?php
$pageTitle = "Контакты - ТехноДомъ";
require_once 'includes/header.php';
?>

<section class="breadcrumbs">
    <div class="container">
        <a href="index.php">Главная</a> > <span>Контакты</span>
    </div>
</section>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТехноДомъ - Магазин бытовой техники</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<!-- Основное содержимое -->
<main class="container">
    <h1>Контакты</h1>
    
    <div class="contacts-content">
        <div class="contact-info">
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <h3>Адрес магазина</h3>
                    <p>Москва, ул. Техническая, 15</p>
                    <p class="contact-note">Метро: Технопарк (5 минут пешком)</p>
                </div>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h3>Телефоны</h3>
                    <p><strong>+7 (495) 123-45-67</strong> - Основной</p>
                    <p>+7 (495) 123-45-68 - Техническая поддержка</p>
                    <p>+7 (495) 123-45-69 - Отдел доставки</p>
                </div>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h3>Электронная почта</h3>
                    <p><strong>info@tehnodom.ru</strong> - Общие вопросы</p>
                    <p>sales@tehnodom.ru - Отдел продаж</p>
                    <p>support@tehnodom.ru - Техническая поддержка</p>
                </div>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="contact-details">
                    <h3>График работы</h3>
                    <p><strong>Магазин:</strong></p>
                    <p>Понедельник - Пятница: 9:00 - 21:00</p>
                    <p>Суббота - Воскресенье: 10:00 - 20:00</p>
                    
                    <p><strong>Служба доставки:</strong></p>
                    <p>Ежедневно: 8:00 - 22:00</p>
                    
                    <p><strong>Техническая поддержка:</strong></p>
                    <p>Круглосуточно</p>
                </div>
            </div>
        </div>
        
        <div class="contact-form-section">
            <h2>Обратная связь</h2>
            <p>Заполните форму ниже, и мы свяжемся с вами в ближайшее время</p>
            
            <form class="contact-form" id="contact-form" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Ваше имя *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Тема сообщения</label>
                    <select id="subject" name="subject">
                        <option value="general">Общий вопрос</option>
                        <option value="product">Вопрос о товаре</option>
                        <option value="delivery">Доставка</option>
                        <option value="warranty">Гарантия и ремонт</option>
                        <option value="complaint">Жалоба</option>
                        <option value="cooperation">Сотрудничество</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Опишите ваш вопрос подробно..."></textarea>
                </div>
                
                <div class="form-agreement">
                    <label>
                        <input type="checkbox" name="agreement" required>
                        Я согласен на обработку персональных данных
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Отправить сообщение
                </button>
                
                <div id="form-message"></div>
            </form>
        </div>
    </div>
    
    <!-- Карта проезда -->
    <section class="map-section">
        <h2>Как добраться</h2>
        <div class="map-container">
            <!-- Заглушка для карты  -->
            <div class="map-placeholder">
                <div class="map-content">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Карта проезда</h3>
                    <p>Москва, ул. Техническая, 15</p>
                    <p>Метро: Технопарк</p>
                    <button class="btn btn-outline" onclick="openNavigation()">
                        <i class="fas fa-route"></i> Построить маршрут
                    </button>
                </div>
            </div>
            
            <!-- Альтернативно: можно вставить реальную карту -->
            <!--
            <iframe 
                src="https://yandex.ru/map-widget/v1/?um=constructor%3A1a2b3c4d5e6f7g8h9i0j&amp;source=constructor" 
                width="100%" 
                height="400" 
                frameborder="0">
            </iframe>
            -->
        </div>
        
        <div class="transport-info">
            <h3>Общественный транспорт</h3>
            <div class="transport-options">
                <div class="transport-option">
                    <i class="fas fa-subway"></i>
                    <div>
                        <strong>Метро:</strong> Станция "Технопарк"<br>
                        <span>Выход №4, затем 5 минут пешком</span>
                    </div>
                </div>
                <div class="transport-option">
                    <i class="fas fa-bus"></i>
                    <div>
                        <strong>Автобусы:</strong> №123, 456, 789<br>
                        <span>Остановка "Улица Техническая"</span>
                    </div>
                </div>
                <div class="transport-option">
                    <i class="fas fa-tram"></i>
                    <div>
                        <strong>Трамвай:</strong> №10, 15<br>
                        <span>Остановка "Технический университет"</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ раздел -->
    <section class="contacts-faq">
        <h2>Частые вопросы</h2>
        <div class="faq-items">
            <div class="faq-item">
                <h3>Какой у вас график работы в праздничные дни?</h3>
                <p>В праздничные дни мы работаем по сокращенному графику: с 10:00 до 18:00. Точное расписание на конкретные праздники публикуется на сайте за неделю.</p>
            </div>
            
            <div class="faq-item">
                <h3>Можно ли приехать в магазин без предварительной записи?</h3>
                <p>Да, конечно! Вы можете приехать в любой рабочий день в часы работы магазина. Для консультации с конкретным специалистом рекомендуем предварительно позвонить.</p>
            </div>
            
            <div class="faq-item">
                <h3>Есть ли у вас бесплатная парковка?</h3>
                <p>Да, перед магазином есть бесплатная парковка на 50 машиномест. Для клиентов действует бесплатная парковка на время покупки (до 2 часов).</p>
            </div>
            
            <div class="faq-item">
                <h3>Можно ли вернуть товар через службу доставки?</h3>
                <p>Да, мы можем организовать вывоз товара для возврата. Условия возврата согласовываются индивидуально по телефону с менеджером.</p>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>

<!-- JavaScript для формы обратной связи -->
<script>
// Обработка формы обратной связи
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('form-message');
    
    // Показываем индикатор загрузки
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Отправка...';
    submitBtn.disabled = true;
    
    // В реальном проекте здесь был бы AJAX запрос к серверу
    setTimeout(() => {
        // Имитация успешной отправки
        messageDiv.innerHTML = `
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Ваше сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.
            </div>
        `;
        
        submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Отправить сообщение';
        submitBtn.disabled = false;
        this.reset();
        
        // Скрываем сообщение через 5 секунд
        setTimeout(() => {
            messageDiv.innerHTML = '';
        }, 5000);
    }, 2000);
});

// Функция для построения маршрута
function openNavigation() {
    const address = "Москва, ул. Техническая, 15";
    const mapsUrl = `https://yandex.ru/maps/?text=${encodeURIComponent(address)}`;
    window.open(mapsUrl, '_blank');
}

// Маска для телефона
document.getElementById('phone').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.startsWith('7') || value.startsWith('8')) {
        value = value.substring(1);
    }
    
    let formattedValue = '+7 (';
    if (value.length > 0) {
        formattedValue += value.substring(0, 3);
    }
    if (value.length > 3) {
        formattedValue += ') ' + value.substring(3, 6);
    }
    if (value.length > 6) {
        formattedValue += '-' + value.substring(6, 8);
    }
    if (value.length > 8) {
        formattedValue += '-' + value.substring(8, 10);
    }
    
    e.target.value = formattedValue;
});
</script>

<style>
/*  стили для  контактов */
.contacts-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-bottom: 60px;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-card {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.contact-card:hover {
    transform: translateY(-5px);
}

.contact-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.contact-details h3 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.3rem;
}

.contact-details p {
    margin-bottom: 5px;
    color: #555;
}

.contact-note {
    font-size: 0.9rem;
    color: #666;
    font-style: italic;
}

.contact-form-section {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.contact-form-section h2 {
    color: #2c3e50;
    margin-bottom: 10px;
}

.contact-form-section > p {
    color: #666;
    margin-bottom: 30px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
}

.form-agreement {
    margin: 20px 0;
}

.form-agreement label {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: normal;
    cursor: pointer;
}

.form-agreement input {
    width: auto;
}

.map-section {
    margin-bottom: 60px;
}

.map-container {
    margin-bottom: 30px;
}

.map-placeholder {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    height: 400px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
}

.map-content i {
    font-size: 4rem;
    margin-bottom: 20px;
}

.map-content h3 {
    margin-bottom: 10px;
    font-size: 1.5rem;
}

.transport-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.transport-option {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.transport-option i {
    font-size: 2rem;
    color: #667eea;
}

.contacts-faq {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 10px;
}

.faq-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.faq-item {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.faq-item h3 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.2rem;
}

.faq-item p {
    color: #555;
    line-height: 1.6;
}

.alert {
    padding: 15px;
    border-radius: 5px;
    margin-top: 20px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

/* Адаптивность */
@media (max-width: 768px) {
    .contacts-content {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .transport-options {
        grid-template-columns: 1fr;
    }
    
    .contact-card {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-icon {
        align-self: center;
    }
}

@media (max-width: 480px) {
    .contact-form-section {
        padding: 20px;
    }
    
    .contacts-faq {
        padding: 20px;
    }
    
    .map-content i {
        font-size: 3rem;
    }
}
</style>