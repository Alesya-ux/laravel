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
<nav class=" bg-neutral-50 md:flex shadow-lg shadow-gray-200/50">
    <div class="p-2">
        <img src="pictures/logo/" alt="">
    </div>
    <div class="md:order-2 p-2 flex space-x-2">
        @guest()

            <a href="/login" class="btn btn-soft bg-cyan-700 text-base-200">Вход</a>
            <a href="/register" class="btn btn-soft bg-cyan-700 text-base-200">Регистрация</a>
        @else

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#"  class="btn btn-soft bg-cyan-700 text-base-200" onclick="event.preventDefault();  this.closest('form').submit();">
                    Выход
                </a>
            </form>
            <a href="/home" class="btn btn-soft bg-cyan-700 text-base-200">Кабинет</a>

        @endguest
    </div>
    <div class=" flex px-4 items-center  max-w-screen-xl mx-auto flex-col  md:order-1 md:flex-row">

        <a href="/" class="p-2 hover:bg-base-200 rounded-md">Главная</a>


        <div class="dropdown">
            <div tabindex="0" role="button" class="btn m-1 p-2 hover:bg-base-200 rounded-md">Каталог</div>
            <ul tabindex="0" class="dropdown-content z-[1] menu shadow bg-base-100 rounded-box  min-w-max">
                <li><a href="/catalog/podcategory1">Дезковрики и антибактериальные коврики</a></li>
                <li><a href="/catalog/podcategory2">Оборудование для дезинфекции</a></li>
                <li><a href="/catalog/podcategory3">Дозаторы</a></li>
                <li><a href="/catalog/podcategory4">Перекись</a></li>
                <li><a href="/catalog/podcategory5">Преобразователь.Обезжириватель</a></li>
            </ul>
        </div>
@if($world == 'aboute')
        <span  class="p-2 ">О нас</span>
        @else
            <a href="/aboute" class="p-2 hover:bg-base-200 rounded-md">О нас</a>
        @endif

        @if($world == 'delivery')
            <span  class="p-2 ">Доставка</span>
        @else
            <a href="/delivery" class="p-2 hover:bg-base-200 rounded-md">Доставка</a>
        @endif

        @if($world == 'contacts')
            <span  class="p-2 ">Контакты</span>
        @else
            <a href="/contacts" class="p-2 hover:bg-base-200 rounded-md">Контакты</a>
        @endif
    </div>
</nav>

@yield('content')
<div class="mt-6 ml-4 w-full lg:w-1/2">
    <h2 class=text-3xl font-bold text-base-200>Для связи</h2>
</div>
<div class="flex w-full flex-col lg:flex-row p-4 gap-4 mt-6">

    <div class="card bg-base-200 rounded-box grid flex-1 place-items-center">
        <img
            src="/pictures/maskot/"
            class="max-w-sm rounded-lg shadow-2xl"/>
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
                        <h3 class="text-lg font-bold">Hello!</h3>
                        <p class="py-4">Press ESC key or click the button below to close</p>
                        <div class="modal-action">
                            <form method="dialog">
                                импут
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-horizontal footer-center bg-base-200 text-base-content rounded p-10 mt-6">
    <nav class="grid grid-flow-col gap-4">
        <a href="/">Главная</a>
        <a class="link link-hover">Каталог</a>
        <a href="/aboute">О нас</a>
        <a href="/price">Доставка</a>
        <a href="/contacts">Контакты</a>
    </nav>

    <aside>
        <p>2010-2025</p>
        <p>АДЕНТИНА СЕРВИС</p>
    </aside>
</footer>
</body>
</html>
