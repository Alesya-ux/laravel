<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="pictures/logo/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-50 ">
<nav class="bg-neutral-50 flex flex-col shadow-lg shadow-gray-200/50">
    <div class="flex flex-col md:flex-row items-center justify-between p-2">
        <!-- Логотип -->
        <div class="flex justify-center">
            <a href="/">
                <img src="/pictures/logo/favicon.ico" alt="Logo" class="ml-8 cursor-pointer">
            </a>
        </div>



        <!-- Контактные данные (в приоритете для mobile) -->
        <div class="flex flex-col items-center justify-center md:items-end order-3 md:order-2">
            <div>Телефон: <a href="tel:+375296133169" class="hover:text-cyan-700">+375 (29) 613-31-69</a></div>
            <div>Адрес: <a href="https://www.google.com/maps?q=Ваш+точный+адрес" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-700">г. Минск, ул.Ваупшасова, 42А</a></div>
            <div>Режим работы: Пн-Пт, 9:00-17:30</div>
        </div>

        <!-- Кнопки Вход/Регистрация/Кабинет (в приоритете для desktop) -->
        <div class="flex space-x-2 justify-center md:justify-start order-2 md:order-3">
            @guest()
                <a href="/login" class="btn btn-soft bg-cyan-700 text-base-200">Вход</a>
                <a href="/register" class="btn btn-soft bg-cyan-700 text-base-200">Регистрация</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="btn btn-soft bg-cyan-700 text-base-200" onclick="event.preventDefault(); this.closest('form').submit();">
                        Выход
                    </a>
                </form>
                <a href="/home" class="btn btn-soft bg-cyan-700 text-base-200">Кабинет</a>
            @endguest
        </div>
    </div>

    <!-- Навигационные ссылки (Главная, Каталог, и т.д.) -->
    <div class="flex px-4 items-center max-w-screen-xl mx-auto flex-col md:flex-row order-1 md:order-1">
        <a href="/" class="p-2 hover:bg-base-200 rounded-md">Главная</a>
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn m-1 p-2 hover:bg-base-200 rounded-md">Каталог</div>
            <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-base-100 rounded-box min-w-max">
                @foreach($catalogs as $catalog)
                <li><a href="/catalog/{{$catalog->id}}" class="max-w-[200px] text-wrap">{{$catalog->name}}</a></li>
                @endforeach
            </ul>
        </div>
        @if($world == 'aboute')
            <span class="p-2 bg-cyan-700 text-base-200 rounded-md">О нас</span>
        @else
            <a href="/aboute" class="p-2 hover:bg-base-200 rounded-md">О нас</a>
        @endif

        @if($world == 'delivery')
            <span class="p-2 bg-cyan-700 text-base-200 rounded-md">Доставка</span>
        @else
            <a href="/delivery" class="p-2 hover:bg-base-200 rounded-md">Доставка</a>
        @endif

        @if($world == 'contacts')
            <span class="p-2 bg-cyan-700 text-base-200 rounded-md">Контакты</span>
        @else
            <a href="/contacts" class="p-2 hover:bg-base-200 rounded-md">Контакты</a>
        @endif
    </div>
</nav>

@yield('content')
<div class="mt-20 ml-4 w-full lg:w-1/2">
    <h2 class=text-3xl font-bold text-base-200>Для Связи</h2>
</div>
<div class="flex w-full flex-col lg:flex-row p-4 gap-4 mt-6 relative overflow-hidden">

    <div class="card bg-base-200 rounded-box grid flex-1 place-items-center relative overflow-hidden">
        <div class="card-bg absolute top-0 left-0 w-full h-full z-0" style="background-image: url('/pictures/forma2.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
        <img
            src="/pictures/maskot/zapis2.png"
            class="max-w-sm h-96 object-cover rounded-lg relative z-10" style="opacity: 1;" />
    </div>

    <div class="card bg-cyan-700 rounded-box grid flex-1 place-items-stretch ">
        <div class="flex flex-col h-full">
            <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200">

                <p class="p-6">У Вас остались вопросы?</p>
            </div>
            <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200 text-3xl">

                <p class="p-4">Заполните форму обратной связи и мы свяжемся с Вами в ближайшее время </p>
            </div>
            <div class="p-4 flex-grow flex items-center text-base-200">
                <button class="btn" onclick="my_modal_1.showModal()">Оставь заявку</button>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Оставьте свои данные</h3>

                        <form method="POST">
                            <div class="mb-4">
                                <label for="name" class="block text-base-200 text-sm font-bold mb-2">Имя:</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-base-200 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Ваше имя"
                                    required
                                />
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-base-200 text-sm font-bold mb-2">Номер телефона:</label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-base-200 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="+375 (__) ___-__-__"
                                    required
                                />
                            </div>
                            <div class="modal-action">
                                <button type="submit" class="btn btn-soft bg-cyan-700 text-base-200">Отправить</button>
                                <form method="dialog">
                                    <button class="btn btn-soft bg-cyan-700 text-base-200">Закрыть</button>
                                </form>
                            </div>
                        </form>

                    </div>
                </dialog>
            </div>
        </div>
    </div>
</div>

<footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content p-4 mt-20">
    <aside>
        <p>Авторские права © 2025 - Все права защищены ACME Industries Ltd.</p>
    </aside>
</footer>
</body>
</html>
