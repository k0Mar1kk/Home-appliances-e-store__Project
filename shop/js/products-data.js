// Демо-данные товаров
const products = [
    {
        id: 1,
        name: "Холодильник Samsung RB37",
        price: 54990,
        oldPrice: 59990,
        category: "Холодильники",
        categoryId: 1,
        brand: "samsung",
        image: "images/products/fridge-samsung.jpg",
        description: "Двухкамерный холодильник с No Frost, 367 л",
        inStock: true,
        features: ["No Frost", "Энергопотребление A+", "Объем 367 л"]
    },
    {
        id: 2,
        name: "Стиральная машина LG F2J6",
        price: 42990,
        oldPrice: null,
        category: "Стиральные машины",
        categoryId: 2,
        brand: "lg",
        image: "images/products/washing-lg.jpg",
        description: "Стиральная машина с сушкой, загрузка 9 кг",
        inStock: true,
        features: ["Сушка", "Загрузка 9 кг", "14 программ"]
    },
    {
        id: 3,
        name: "Телевизор Sony X80J 55\"",
        price: 69990,
        oldPrice: null,
        category: "Телевизоры",
        categoryId: 3,
        brand: "sony",
        image: "images/products/tv-sony.jpg",
        description: "4K LED телевизор, Android TV",
        inStock: true,
        features: ["4K Ultra HD", "Smart TV", "Android TV"]
    },
    {
        id: 4,
        name: "Кофемашина Bosch TAS",
        price: 19990,
        oldPrice: 21990,
        category: "Кухонная техника",
        categoryId: 4,
        brand: "bosch",
        image: "images/products/coffee-bosch.jpg",
        description: "Капсульная кофемашина, 4 вида напитков",
        inStock: true,
        features: ["Капсульная система", "4 напитка", "Быстрый нагрев"]
    },
    {
        id: 5,
        name: "Микроволновка LG MS3235GIS",
        price: 8490,
        oldPrice: 9990,
        category: "Кухонная техника",
        categoryId: 4,
        brand: "lg",
        image: "images/products/microwave-lg.jpg",
        description: "Микроволновая печь с грилем, 32 л",
        inStock: true,
        features: ["Объем 32 л", "Гриль", "10 уровней мощности"]
    },
    {
        id: 6,
        name: "Холодильник Bosch KGN39",
        price: 62990,
        oldPrice: 68990,
        category: "Холодильники",
        categoryId: 1,
        brand: "bosch",
        image: "images/products/fridge-bosch.jpg",
        description: "Двухкамерный холодильник с зоной свежести",
        inStock: false,
        features: ["No Frost", "Зона свежести", "Энергопотребление A++"]
    },
    {
        id: 7,
        name: "Пылесос Philips PowerPro",
        price: 12990,
        oldPrice: null,
        category: "Мелкая техника",
        categoryId: 6,
        brand: "philips",
        image: "images/products/vacuum-philips.jpg",
        description: "Мощный пылесос с контейнером для пыли",
        inStock: true,
        features: ["Мощность 650 Вт", "Контейнер 2 л", "HEPA фильтр"]
    },
    {
        id: 8,
        name: "Кондиционер Ballu BSEP-07HN1",
        price: 32990,
        oldPrice: 35990,
        category: "Климатическая техника",
        categoryId: 5,
        brand: "ballu",
        image: "images/products/aircon-ballu.jpg",
        description: "Инверторный кондиционер, 7000 BTU",
        inStock: true,
        features: ["Инверторный", "7000 BTU", "Wi-Fi управление"]
    }
];

// Категории товаров
const categories = [
    { id: 1, name: "Холодильники", productCount: 12 },
    { id: 2, name: "Стиральные машины", productCount: 8 },
    { id: 3, name: "Телевизоры", productCount: 15 },
    { id: 4, name: "Кухонная техника", productCount: 25 },
    { id: 5, name: "Климатическая техника", productCount: 10 },
    { id: 6, name: "Мелкая техника", productCount: 30 }
];

// Бренды
const brands = [
    { id: "samsung", name: "Samsung" },
    { id: "lg", name: "LG" },
    { id: "bosch", name: "Bosch" },
    { id: "sony", name: "Sony" },
    { id: "philips", name: "Philips" },
    { id: "indesit", name: "Indesit" },
    { id: "ballu", name: "Ballu" }
];