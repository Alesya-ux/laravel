<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="pictures/logo/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>АДЕНТИНА СЕРВИС</title>
    <meta name="description" content="Компания АДЕНТИНА СЕРВИС осуществляет продажу дезматов и дезковриков,генераторов холодного и горячего тумана,а также доставку продукции во все Беларуси"> <!-- Сделать описание компании -->
    <meta name="keywords" content="дезковрики, дезковрик, дезматы, дезинфектанты, дезинфекционные коврики,генераторы горячего тумана, дезустановка, дустер, дозатор сенсорный, дозатор локтевой, генераторы холодного тумана "><!-- Записать ключевые слова -->
</head> <!-- Отладка SEO -->

<body class="bg-base-200">

<header class="shadow-sm"> <!-- Доработать -->
    <nav class="bg-neutral-50 sticky top-0 z-50 flex flex-col shadow-lg shadow-gray-200/50">
        <div class="flex flex-col md:flex-row items-center justify-between border-cyan-700 border-b">
            <div class="flex justify-center mt-2 mb-2">
                <a href="/">
                    <img src="/pictures/logo/favicon.ico" alt="Logo" class="ml-8 cursor-pointer h-16">
                </a>
            </div> <!-- ЛОГО -->
            <div>
                <form action="/search" method="GET" class="flex items-center">
                    <input
                        type="text"
                        name="q"
                        placeholder="Поиск..."
                        class="p-2 border rounded-md focus:outline-none  w-64"/>
                    <button type="submit" class="btn ml-2">
                        Найти
                    </button>
                </form> <!-- Поисковая форма/ Нужно сделать чтоб она работала -->
            </div>
            <div class="flex flex-col items-center justify-center md:items-start order-2 text-sm">
                <div>Телефон: <a href="tel:+375296133169" class="hover:text-cyan-700">+375 (29) 613-31-69</a></div>
                <div>Адрес: <a href="https://www.google.com/maps?q=Ваш+точный+адрес" target="_blank"
                               rel="noopener noreferrer" class="hover:text-cyan-700">г. Минск, ул.Ваупшасова, 42А</a>
                </div>
                <div>Режим работы: Пн-Пт 9:00-17:30</div>
            </div> <!-- Адрес  и телефон -->

            <div class="flex space-x-2 justify-end items-center mt-2 order-3">
                <form action="">
                    @guest()
                        <a href="/login" class="btn btn-soft bg-cyan-700 text-base-200 btn">Вход</a>
                        <a href="/register" class="btn btn-soft bg-cyan-700 text-base-200 btn">Регистрация</a>
                </form>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" class="btn btn-soft bg-cyan-700 text-base-200 btn"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Выход
                        </a>
                    </form>
                    <form action="">
                        <a href="/dashboard" class="btn btn-soft bg-cyan-700 text-base-200 btn">Кабинет</a>
                    </form>
                @endguest
            </div> <!-- Кнопки, сюда нужно добавить карзину и обьединить кнопки вход и регистрация -->
        </div> <!-- ДОРАБОТАТЬ кнопки -->
        <div class="flex items-center max-w-screen-xl mx-auto flex-col md:flex-row order-1 md:order-1 ">
            <a href="/" class="p-2 hover:bg-base-200 rounded-md">Главная</a>
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn m-1 p-2 hover:bg-base-200 rounded-md">Каталог</div>
                <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1">
                    @foreach($catalogs as $catalog)
                        <li><a href="/catalog/{{$catalog->id}}" class="max-w-[200px] text-wrap">{{$catalog->name}}</a>
                        </li>
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
        </div> <!-- Каталог -->
    </nav>
</header>

@yield('content')

<aside class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[70%] mx-auto mt-10 " >
    <h2 class="text-3xl font-semibold">Для Связи</h2>
    <div class="flex w-full flex-col lg:flex-row p-4 gap-4 mt-6 relative overflow-hidden justify-center">
        <div class="card rounded-box grid flex-1 place-items-center relative overflow-hidden">
            <img
                src="/pictures/maskot/zapis2.png"
                class="max-w-sm h-80 object-cover rounded-lg relative z-10"
                alt="Изображение маскота" />
        </div>
        <div class="card bg-cyan-700 rounded-box grid flex-1 place-items-stretch pulse">
            <div class="flex flex-col h-full text-base-200">
                <div class="p-2 flex-grow border-b border-base-300 flex items-center">
                    <p class="p-2 text-base">У Вас остались вопросы?</p>
                </div>
                <div class="p-2 flex-grow border-b border-base-300 flex items-center">
                    <p class="p-2 text-sm">Заполните форму обратной связи, и мы свяжемся с Вами в ближайшее время.</p>
                </div>
                <div class="p-4 flex-grow flex items-center">
                    <button class="btn" onclick="my_modal_1.showModal()">Оставь заявку</button>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box">
                            <h3 class="text-2xl font-medium">Оставьте свои данные</h3>
                            <form method="POST">
                                <div class="mb-4">
                                    <label for="name" class="block font-medium mb-2">Имя:</label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-base-200 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="Ваше имя"
                                        required />
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="block font-medium mb-2">Номер телефона:</label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-base-200 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="+375 (__) ___-__-__"
                                        required />
                                </div>
                                <div class="modal-action">
                                    <button type="submit" class="btn btn-soft bg-cyan-700 text-base-200">Отправить</button>
                                    <button type="button" class="btn btn-soft bg-cyan-700 text-base-200" onclick="my_modal_1.close()">Закрыть</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
    </div> <!-- Доделать форму -->
    <style>
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</aside>

<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10"> <!--Должна быть как активная карусель-->
    <div class="ml-4 w-full lg:w-1/2 ">
        <h2 class="text-3xl font-semibold">Клиенты</h2>
    </div>
    <div class="carousel carousel-center rounded-box mt-2 flex justify-center">
        <div class="carousel-item px-2">
            <img src="/pictures/klient/1.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/2.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/3.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/4.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/5.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/6.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/7.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/8.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/9.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/10.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
        <div class="carousel-item px-2">
            <img src="/pictures/klient/11.png" alt="klient" class="rounded-lg w-32 h-auto shadow-md"/>
        </div>
    </div>
</section>


<footer class="shadow-inner"> <!-- Закончено-->
    <div class="footer sm:footer-horizontal bg-neutral-50  p-10 mt-20 ">
        <nav>
            <h3 class="footer-title text-base font-medium">Каталог</h3>
            @foreach($catalogs as $catalog)
                <a href="/catalog/{{$catalog->id}}" class="text-sm">{{$catalog->name}}</a>
            @endforeach
        </nav>
        <nav>
            <h3 class="footer-title text-base font-medium">Адентина Сервис</h3>
            @if($world == 'aboute')
                <span class="text-base-200 text-sm">О нас</span>
            @else
                <a href="/aboute">О нас</a>
            @endif

            @if($world == 'delivery')
                <span class="text-base-200 text-sm">Доставка</span>
            @else
                <a href="/delivery">Доставка</a>
            @endif

            @if($world == 'contacts')
                <span class="text-base-200 text-sm">Контакты</span>
            @else
                <a href="/contacts">Контакты</a>
            @endif
        </nav>
        <nav>
            <h3 class="footer-title text-base font-medium">Контактная информация</h3>
            <p>Телефон: <a href="tel:+375296133169" class="hover:text-cyan-700 text-sm">+375 (29) 613-31-69</a></p>
            <p>Адрес: <a href="https://www.google.com/maps?q=Ваш+точный+адрес" target="_blank" rel="noopener noreferrer"
                         class="hover:text-cyan-700 text-sm">г. Минск, ул.Ваупшасова, 42А</a></p>
            <p>Режим работы: Пн-Пт 9:00-17:30</p>
        </nav>
    </div>
    <div class="footer bg-neutral-50 border-cyan-700 border-t px-10 py-4">
        <aside class="grid-flow-col items-center">
            <a href="/">
                <img src="/pictures/logo/favicon.ico" alt="Logo" class=" cursor-pointer">
            </a>
            <p>
                Сермяжко А. Н.
                <br/>
                Предоставление надежной технологии с 2025
            </p>
        </aside>
        <aside class="md:place-self-center md:justify-self-end">
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                    </svg>
                </a>
                <a>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                    </svg>
                </a>
                <a>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                    </svg>
                </a>
            </div>
        </aside>
    </div>
</footer>

</body>

</html>
