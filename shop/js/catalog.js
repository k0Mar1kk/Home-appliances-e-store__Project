// Фильтры и сортировка
let currentFilters = {
    category: 'all',
    minPrice: null,
    maxPrice: null,
    brands: [],
    inStock: true,
    searchQuery: ''
};

let currentSort = 'popular';
let currentView = 'grid';
let currentPage = 1;
const productsPerPage = 6;

// Инициализация каталога
function initCatalog() {
    const params = getUrlParams();
    
    // Устанавливаем фильтры из URL параметров
    if (params.category) {
        currentFilters.category = params.category;
        document.querySelector(`[data-category="${params.category}"]`)?.classList.add('active');
        document.querySelector('[data-category="all"]')?.classList.remove('active');
    }
    
    if (params.search) {
        currentFilters.searchQuery = params.search;
        document.getElementById('search-input').value = params.search;
    }
    
    // Отображаем товары
    displayProducts();
    setupEventListeners();
}

// Отображение товаров
function displayProducts() {
    const container = document.getElementById('products-container');
    if (!container) return;
    
    // Фильтруем товары
    const filteredProducts = filterProducts();
    
    // Сортируем товары
    const sortedProducts = sortProducts(filteredProducts);
    
    // Пагинация
    const totalPages = Math.ceil(sortedProducts.length / productsPerPage);
    const startIndex = (currentPage - 1) * productsPerPage;
    const paginatedProducts = sortedProducts.slice(startIndex, startIndex + productsPerPage);
    
    // Обновляем счетчик товаров
    document.getElementById('products-found').textContent = sortedProducts.length;
    
    // Отображаем товары
    if (currentView === 'grid') {
        container.innerHTML = paginatedProducts.map(product => `
            <div class="product-card">
                <div class="product-image">
                    <img src="${product.image}" alt="${product.name}" onerror="this.src='images/no-image.jpg'">
                    ${!product.inStock ? '<span class="out-of-stock">Нет в наличии</span>' : ''}
                </div>
                <div class="product-info">
                    <h3>${product.name}</h3>
                    <p class="product-brand">${getBrandName(product.brand)}</p>
                    <p class="product-description">${product.description}</p>
                    <div class="product-price">
                        ${product.oldPrice ? 
                            `<span class="old-price">${product.oldPrice.toLocaleString()} ₽</span>` : 
                            ''
                        }
                        <span class="current-price">${product.price.toLocaleString()} ₽</span>
                    </div>
                    <div class="product-actions">
                        <button class="btn btn-primary ${!product.inStock ? 'disabled' : ''}" 
                                onclick="addToCart(${product.id})" 
                                ${!product.inStock ? 'disabled' : ''}>
                            <i class="fas fa-cart-plus"></i> В корзину
                        </button>
                        <button class="btn btn-outline" onclick="viewProductDetails(${product.id})">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    } else {
        // Представление списком
        container.innerHTML = paginatedProducts.map(product => `
            <div class="product-card list-view">
                <div class="product-image">
                    <img src="${product.image}" alt="${product.name}" onerror="this.src='images/no-image.jpg'">
                    ${!product.inStock ? '<span class="out-of-stock">Нет в наличии</span>' : ''}
                </div>
                <div class="product-info">
                    <h3>${product.name}</h3>
                    <p class="product-brand">${getBrandName(product.brand)}</p>
                    <p class="product-description">${product.description}</p>
                    <div class="product-features">
                        <strong>Характеристики:</strong> ${product.features.join(', ')}
                    </div>
                    <div class="product-price">
                        ${product.oldPrice ? 
                            `<span class="old-price">${product.oldPrice.toLocaleString()} ₽</span>` : 
                            ''
                        }
                        <span class="current-price">${product.price.toLocaleString()} ₽</span>
                    </div>
                    <div class="product-actions">
                        <button class="btn btn-primary ${!product.inStock ? 'disabled' : ''}" 
                                onclick="addToCart(${product.id})" 
                                ${!product.inStock ? 'disabled' : ''}>
                            <i class="fas fa-cart-plus"></i> В корзину
                        </button>
                        <button class="btn btn-outline" onclick="viewProductDetails(${product.id})">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }
    
    // Отображаем пагинацию
    displayPagination(totalPages);
}

// Фильтрация товаров
function filterProducts() {
    return products.filter(product => {
        // Фильтр по категории
        if (currentFilters.category !== 'all' && product.categoryId != currentFilters.category) {
            return false;
        }
        
        // Фильтр по цене
        if (currentFilters.minPrice && product.price < currentFilters.minPrice) {
            return false;
        }
        if (currentFilters.maxPrice && product.price > currentFilters.maxPrice) {
            return false;
        }
        
        // Фильтр по брендам
        if (currentFilters.brands.length > 0 && !currentFilters.brands.includes(product.brand)) {
            return false;
        }
        
        // Фильтр по наличию
        if (currentFilters.inStock && !product.inStock) {
            return false;
        }
        
        // Поиск по запросу
        if (currentFilters.searchQuery) {
            const query = currentFilters.searchQuery.toLowerCase();
            const searchIn = `${product.name} ${product.description} ${getBrandName(product.brand)}`.toLowerCase();
            if (!searchIn.includes(query)) {
                return false;
            }
        }
        
        return true;
    });
}

// Сортировка товаров
function sortProducts(productsList) {
    switch (currentSort) {
        case 'price-asc':
            return [...productsList].sort((a, b) => a.price - b.price);
        case 'price-desc':
            return [...productsList].sort((a, b) => b.price - a.price);
        case 'name':
            return [...productsList].sort((a, b) => a.name.localeCompare(b.name));
        case 'newest':
            return [...productsList].reverse();
        default: // popular
            return productsList;
    }
}

// Пагинация
function displayPagination(totalPages) {
    const paginationContainer = document.getElementById('pagination');
    if (!paginationContainer) return;
    
    if (totalPages <= 1) {
        paginationContainer.innerHTML = '';
        return;
    }
    
    let paginationHTML = '';
    
    // Кнопка "Назад"
    if (currentPage > 1) {
        paginationHTML += `<button onclick="goToPage(${currentPage - 1})">‹</button>`;
    }
    
    // Страницы
    for (let i = 1; i <= totalPages; i++) {
        if (i === currentPage) {
            paginationHTML += `<button class="active">${i}</button>`;
        } else {
            paginationHTML += `<button onclick="goToPage(${i})">${i}</button>`;
        }
    }
    
    // Кнопка "Вперед"
    if (currentPage < totalPages) {
        paginationHTML += `<button onclick="goToPage(${currentPage + 1})">›</button>`;
    }
    
    paginationContainer.innerHTML = paginationHTML;
}

function goToPage(page) {
    currentPage = page;
    displayProducts();
    window.scrollTo(0, 0);
}

// Получение имени бренда по ID
function getBrandName(brandId) {
    const brand = brands.find(b => b.id === brandId);
    return brand ? brand.name : brandId;
}

// Просмотр деталей товара
function viewProductDetails(productId) {
    window.location.href = `product.html?id=${productId}`;
}

// Настройка обработчиков событий
function setupEventListeners() {
    // Фильтр по категориям
    document.querySelectorAll('.category-filter a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.category-filter a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
            
            currentFilters.category = this.dataset.category;
            currentPage = 1;
            displayProducts();
        });
    });
    
    // Фильтр по цене
    const applyPriceFilterBtn = document.getElementById('apply-price-filter');
    if (applyPriceFilterBtn) {
        applyPriceFilterBtn.addEventListener('click', function() {
            const minPrice = parseInt(document.getElementById('min-price').value) || null;
            const maxPrice = parseInt(document.getElementById('max-price').value) || null;
            
            currentFilters.minPrice = minPrice;
            currentFilters.maxPrice = maxPrice;
            currentPage = 1;
            displayProducts();
        });
    }
    
    // Фильтр по брендам
    document.querySelectorAll('.brand-filter input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedBrands = Array.from(document.querySelectorAll('.brand-filter input:checked'))
                .map(cb => cb.value);
            
            currentFilters.brands = selectedBrands;
            currentPage = 1;
            displayProducts();
        });
    });
    
    // Фильтр по наличию
    document.querySelectorAll('.stock-filter input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const inStock = document.querySelector('.stock-filter input[value="in-stock"]').checked;
            const preOrder = document.querySelector('.stock-filter input[value="pre-order"]').checked;
            
            currentFilters.inStock = inStock;
            // Для простоты, если выбраны оба или только "под заказ", показываем все товары
            if (!inStock && !preOrder) {
                currentFilters.inStock = true; // По умолчанию показываем только в наличии
            } else if (inStock && preOrder) {
                currentFilters.inStock = false; // Показываем все, включая отсутствующие
            }
            
            currentPage = 1;
            displayProducts();
        });
    });
    
    // Сброс фильтров
    const resetFiltersBtn = document.getElementById('reset-filters');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', function() {
            currentFilters = {
                category: 'all',
                minPrice: null,
                maxPrice: null,
                brands: [],
                inStock: true,
                searchQuery: ''
            };
            
            // Сбрасываем UI
            document.querySelectorAll('.category-filter a').forEach(a => a.classList.remove('active'));
            document.querySelector('[data-category="all"]').classList.add('active');
            
            document.getElementById('min-price').value = '';
            document.getElementById('max-price').value = '';
            
            document.querySelectorAll('.brand-filter input').forEach(cb => cb.checked = false);
            document.querySelector('.stock-filter input[value="in-stock"]').checked = true;
            document.querySelector('.stock-filter input[value="pre-order"]').checked = false;
            
            currentPage = 1;
            displayProducts();
        });
    }
    
    // Сортировка
    const sortSelect = document.getElementById('sort-select');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            currentSort = this.value;
            displayProducts();
        });
    }
    
    // Переключение вида
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    
    if (gridViewBtn && listViewBtn) {
        gridViewBtn.addEventListener('click', function() {
            currentView = 'grid';
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            displayProducts();
        });
        
        listViewBtn.addEventListener('click', function() {
            currentView = 'list';
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            displayProducts();
        });
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('products-container')) {
        initCatalog();
    }
});

// Экспортируем функции для глобального использования
window.goToPage = goToPage;
window.viewProductDetails = viewProductDetails;