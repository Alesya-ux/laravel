<!-- Глобальные скрипты для всего сайта -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Добавляем эффект волны для кнопок
    function addRippleEffect() {
        const buttons = document.querySelectorAll('.btn, button');
        buttons.forEach(button => {
            if (!button.classList.contains('ripple')) {
                button.classList.add('ripple');
            }
        });
    }

    // Добавляем hover эффекты для карточек
    function addHoverEffects() {
        const cards = document.querySelectorAll('.card, .bg-white.rounded-lg');
        cards.forEach(card => {
            if (!card.classList.contains('card-hover')) {
                card.classList.add('card-hover');
            }
        });

        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (!img.classList.contains('img-hover')) {
                img.classList.add('img-hover');
            }
        });
    }

    // Добавляем анимацию для кнопок
    function addButtonAnimations() {
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            if (!btn.classList.contains('btn-animate')) {
                btn.classList.add('btn-animate');
            }
        });
    }

    // Добавляем тени для секций
    function addSectionShadows() {
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            if (!section.classList.contains('section-shadow')) {
                section.classList.add('section-shadow');
            }
        });
    }

    // Инициализация всех эффектов
    function initializeEffects() {
        addRippleEffect();
        addHoverEffects();
        addButtonAnimations();
        addSectionShadows();
    }

    // Запускаем инициализацию
    initializeEffects();
    
    // ========================================
    // КНОПКА "НАВЕРХ"
    // ========================================
    
    // Создаем кнопку "Наверх"
    function createScrollToTopButton() {
        // Проверяем, не существует ли уже кнопка
        if (document.querySelector('.scroll-to-top-btn')) {
            console.log('Кнопка "Наверх" уже существует');
            return;
        }
        
        console.log('Создаем кнопку "Наверх"...');
        
        const button = document.createElement('button');
        button.innerHTML = '↑';
        button.className = 'scroll-to-top-btn';
        button.setAttribute('aria-label', 'Прокрутить наверх');
        button.setAttribute('title', 'Наверх');
        
        // Добавляем кнопку в body
        document.body.appendChild(button);
        
        console.log('Кнопка добавлена в DOM:', button);
        
        // Показываем/скрываем кнопку при скролле
        let isVisible = false;
        function toggleButtonVisibility() {
            // Показываем кнопку после второй прокрутки экрана (примерно 200% высоты экрана)
            const screenHeight = window.innerHeight;
            const shouldShow = window.pageYOffset > (screenHeight * 2);
            
            if (shouldShow !== isVisible) {
                isVisible = shouldShow;
                if (shouldShow) {
                    button.classList.add('visible');
                    console.log('Показываем кнопку после второй прокрутки экрана');
                } else {
                    button.classList.remove('visible');
                    console.log('Скрываем кнопку - еще не прокрутили достаточно');
                }
            }
        }
        
        // Обработчик скролла
        window.addEventListener('scroll', toggleButtonVisibility, { passive: true });
        
        // Обработчик клика
        button.addEventListener('click', function() {
            console.log('Клик по кнопке "Наверх"');
            
            // Используем нативную плавную прокрутку
            if ('scrollBehavior' in document.documentElement.style) {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                // Fallback для старых браузеров
                const scrollStep = -window.scrollY / (500 / 15);
                const scrollInterval = setInterval(function() {
                    if (window.scrollY !== 0) {
                        window.scrollBy(0, scrollStep);
                    } else {
                        clearInterval(scrollInterval);
                    }
                }, 15);
            }
        });
        
        // Инициализируем видимость
        toggleButtonVisibility();
    }
    
    // Повторная инициализация для динамически загруженного контента
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                setTimeout(initializeEffects, 100);
            }
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    

    
    // Создаем кнопку "Наверх" после инициализации эффектов
    createScrollToTopButton();
    
    // ========================================
    // АНИМАЦИИ ПОЯВЛЕНИЯ ПРИ СКРОЛЛЕ (FADE-IN)
    // ========================================
    
    // Функция для анимации появления элементов
    function initScrollAnimations() {
        console.log('Инициализация анимаций появления при скролле...');
        
        // Настройки для IntersectionObserver
        const observerOptions = {
            threshold: 0.1, // Срабатывает когда 10% элемента видно
            rootMargin: '0px 0px -50px 0px' // Отступ снизу
        };
        
        // Создаем наблюдатель
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Добавляем класс для показа элемента
                    entry.target.classList.add('fade-in-visible');
                    console.log('Элемент появился:', entry.target);
                }
            });
        }, observerOptions);
        
        // Находим все элементы с классом fade-in на текущей странице
        const fadeElements = document.querySelectorAll('.fade-in');
        console.log('Найдено элементов для анимации:', fadeElements.length);
        
        // Начинаем наблюдение за каждым элементом
        fadeElements.forEach(element => {
            fadeObserver.observe(element);
        });
        
        // Наблюдаем за динамически добавленными элементами
        const fadeObserver2 = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1 && node.classList && node.classList.contains('fade-in')) {
                            fadeObserver.observe(node);
                            console.log('Новый fade-in элемент добавлен:', node);
                        }
                    });
                }
            });
        });
        
        fadeObserver2.observe(document.body, {
            childList: true,
            subtree: true
        });
        
        console.log('Анимации появления при скролле инициализированы');
    }
    
    // ========================================
    // ГЛОБАЛЬНАЯ ПЛАВНАЯ ПРОКРУТКА
    // ========================================
    
    // Функция для глобальной плавной прокрутки
    function initGlobalSmoothScroll() {
        console.log('Инициализация глобальной плавной прокрутки...');
        
        // Применяем плавную прокрутку ко всем ссылкам
        function addSmoothScrollToAllLinks() {
            // Все ссылки с href="#..."
            const internalLinks = document.querySelectorAll('a[href^="#"]');
            internalLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;
                    
                    const targetElement = document.querySelector(href);
                    if (targetElement) {
                        e.preventDefault();
                        
                        // Плавная прокрутка к элементу
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        
                        console.log('Плавная прокрутка к:', href);
                    }
                });
            });
            
            // Все ссылки с href="javascript:void(0)" или onclick
            const jsLinks = document.querySelectorAll('a[href="javascript:void(0)"], a[onclick]');
            jsLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Добавляем небольшую задержку для плавности
                    setTimeout(() => {
                        if (link.getAttribute('href') === '#top' || link.textContent.toLowerCase().includes('наверх')) {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                    }, 100);
                });
            });
        }
        
        // Применяем плавную прокрутку к кнопкам
        function addSmoothScrollToButtons() {
            const scrollButtons = document.querySelectorAll('button[onclick*="scroll"], button[onclick*="top"]');
            scrollButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Проверяем, не является ли это кнопкой "Наверх"
                    if (this.classList.contains('scroll-to-top-btn')) return;
                    
                    // Добавляем плавную прокрутку
                    setTimeout(() => {
                        if (button.textContent.toLowerCase().includes('наверх') || 
                            button.getAttribute('onclick')?.includes('top')) {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                    }, 100);
                });
            });
        }
        
        // Применяем плавную прокрутку к формам
        function addSmoothScrollToForms() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Плавная прокрутка к форме при отправке
                    setTimeout(() => {
                        form.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }, 200);
                });
            });
        }
        
        // Инициализируем все функции плавной прокрутки
        addSmoothScrollToAllLinks();
        addSmoothScrollToButtons();
        addSmoothScrollToForms();
        
        // Применяем плавную прокрутку к динамически загруженному контенту
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    setTimeout(() => {
                        addSmoothScrollToAllLinks();
                        addSmoothScrollToButtons();
                    }, 100);
                }
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
        
        console.log('Глобальная плавная прокрутка инициализирована');
    }
    
    // Инициализируем все функции скролла
    initScrollAnimations();
    initGlobalSmoothScroll();
});
</script>
