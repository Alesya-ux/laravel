<!-- Глобальные стили для всего сайта -->
<style>




/* ========================================
   ГЛОБАЛЬНАЯ ПЛАВНАЯ ПРОКРУТКА
   ======================================== */
html {
    scroll-behavior: smooth; /* Плавная прокрутка для всех ссылок */
}

body {
    scroll-behavior: smooth; /* Дополнительная плавность для body */
}

/* Плавная прокрутка для всех элементов с overflow */
* {
    scroll-behavior: smooth;
}

/* Плавная прокрутка для кастомных скроллбаров */
.custom-scroll {
    scroll-behavior: smooth;
}

/* Плавная прокрутка для модальных окон */
.modal, .modal-content {
    scroll-behavior: smooth;
}

/* Улучшенные стили для модальных окон */
.modal {
    backdrop-filter: blur(4px);
    background-color: rgba(0, 0, 0, 0.6);
}

.modal-box {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(8, 145, 178, 0.1);
    position: relative;
}

/* Анимация появления модального окна */
.modal.show .modal-box {
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(-20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Стили для изображений в модальных окнах */
.modal-box img {
    transition: all 0.3s ease;
}

.modal-box img:hover {
    transform: scale(1.02);
}

/* ========================================
   АНИМАЦИИ ПОЯВЛЕНИЯ ПРИ СКРОЛЛЕ
   ======================================== */
.fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.fade-in-visible {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

/* Плавные переходы для всех элементов */
* {
    transition: all 0.3s ease;
}

/* Улучшенные hover эффекты */
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

/* Адаптивность для мобильных устройств */
@media (max-width: 768px) {
    .scroll-to-top {
        bottom: 20px !important;
        right: 20px !important;
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
    
    .modal-box {
        padding: 1.5rem;
        margin: 1rem;
        max-width: calc(100vw - 2rem);
        max-height: calc(100vh - 2rem);
    }
    
    .modal-box h3 {
        font-size: 1.5rem;
    }
}

/* Дополнительные стили для предотвращения конфликтов */
.scroll-to-top {
    transform: none !important;
    margin: 0 !important;
    padding: 0 !important;
}

/* Дополнительные эффекты для карточек и элементов */
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Анимация для кнопок */
.btn-animate {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-animate::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-animate:hover::before {
    left: 100%;
}

/* Улучшенные тени для секций */
.section-shadow {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.section-shadow:hover {
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* Анимация для изображений */
.img-hover {
    transition: all 0.3s ease;
}

.img-hover:hover {
    transform: scale(1.05);
}

/* Плавное появление текста */
.text-fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.text-fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ========================================
   КНОПКА "НАВЕРХ"
   ======================================== */
.scroll-to-top-btn {
    position: fixed !important;
    bottom: 15px !important;
    right: 30px !important;
    width: 50px !important;
    height: 50px !important;
    background: #F44336 !important;
    color: white !important;
    border: none !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(244, 67, 54, 0.3) !important;
    z-index: 99999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 20px !important;
    font-weight: bold !important;
}

.scroll-to-top-btn:hover {
    background: #D32F2F;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(244, 67, 54, 0.4);
}

.scroll-to-top-btn:active {
    transform: translateY(0);
}

.scroll-to-top-btn.visible {
    opacity: 1 !important;
    visibility: visible !important;
}



/* Адаптивность для мобильных устройств */
@media (max-width: 768px) {
    .scroll-to-top-btn {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
}

/* Эффект волны для кнопок */
.ripple {
    position: relative;
    overflow: hidden;
}

.ripple::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    background-image: radial-gradient(circle, #fff 10%, transparent 10.01%);
    background-repeat: no-repeat;
    background-position: 50%;
    transform: scale(10, 10);
    opacity: 0;
    transition: transform .5s, opacity 1s;
}

.ripple:active::after {
    transform: scale(0, 0);
    opacity: .3;
    transition: 0s;
}




</style>


<?php /**PATH C:\laragon\www\laravel\resources\views/components/global-styles.blade.php ENDPATH**/ ?>