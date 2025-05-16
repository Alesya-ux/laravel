
@extends('layouts.tall')
@section('content')

    <main>
        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
            <div class="carousel w-full"> <!--Добавить картинок с текстом и кнопкой-->
                <div id="slide1" class="carousel-item relative w-full">
                    <div class="hero relative overflow-hidden" style="min-h-200">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/forma.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                            <img
                                src="/pictures/maskot/maskot.png"
                                class="max-w-sm h-80 object-cover rounded-lg" alt="maskot"/>
                            <div>
                                <h1 class="text-5xl font-bold">АДЕНТИНА СЕРВИС</h1>
                                <p class="py-6 text-xl font-semibold">
                                    Защита от вирусов и бактерий: дезинфицирующее оборудование и ковры для предприятий!
                                </p>
                                <a href="/catalog" class="btn btn-soft bg-cyan-700 text-base-200">Каталог</a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide4" class="btn btn-circle">❮</a>
                        <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
                        class="w-full"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide1" class="btn btn-circle">❮</a>
                        <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
                        class="w-full"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide2" class="btn btn-circle">❮</a>
                        <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
                        class="w-full"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide3" class="btn btn-circle">❮</a>
                        <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[70%] mx-auto mt-10">
            <div class="ml-4 w-full lg:w-1/2">
                <h2 class="text-3xl font-semibold">О Нас</h2>
            </div>  <!-- Заменить иконки -->
            <article class="flex w-full flex-col lg:flex-row p-4 gap-4 mt-2 max-w-screen-lg mx-auto">
                <div class="card bg-cyan-700 rounded-box grid flex-1 place-items-stretch shadow">
                    <div class="flex flex-col h-full ">
                        <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200">
                            <img src="/pictures/iconki/dostavka2.png" alt="Иконка моментальной отгрузки"/>
                            <p class="p-6 text-base">Моментальная отгрузка</p>
                            <p class="text-sm">Отгрузка вашего товара в течении минуты после оплаты!</p>
                        </div>
                        <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200">
                            <img src="/pictures/iconki/nalichie2.png" alt="Иконка актуального наличия"/>
                            <p class="p-6 text-base">Актуальное наличие</p>
                            <p class="text-sm">Наличие товара и все цены на сайте всегда актуальны!</p>
                        </div>
                        <div class="p-4 flex-grow flex items-center text-base-200">
                            <img src="/pictures/iconki/sertificat2.png" alt="Иконка комплекта документов"/>
                            <p class="p-6 text-base">Комплект документов</p>
                            <p class="text-sm">Полный пакет документов, максимально быстрая обработка заказов!</p>
                        </div>
                    </div>
                </div>
                <div class=" bg-base-200 rounded-box grid flex-1 place-items-center text-base shadow-md">
                    <p class="text-left break-words max-w-full w-full p-4 ">
                        Мы – надежный поставщик профессиональных дезинфицирующих средств и оборудования, предназначенных
                        для обеспечения безопасности и гигиены в вашем бизнесе.
                        В современном мире, где чистота и санитария играют ключевую роль, мы предлагаем широкий
                        ассортимент высококачественных продуктов и передовых решений для дезинфекции помещений и
                        оборудования любого масштаба. От небольших офисов до крупных промышленных предприятий – мы
                        поможем вам создать безопасную и здоровую среду для ваших сотрудников и клиентов.
                    </p>
                </div>
            </article>
            <div class="stats shadow w-full mt-10 shadow-md">
                <div class="stat">
                    <div class="stat-figure text-cyan-700">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Всего заказов</div>
                    <div class="stat-value text-cyan-700">25.6K</div>
                    <div class="stat-desc">21% больше чем в прошлом месяце</div>
                </div>
                <div class="stat">
                    <div class="stat-figure text-cyan-700">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Новых пользователь</div>
                    <div class="stat-value text-cyan-700">2.6M</div>
                    <div class="stat-desc">21% больше чем за прошлый год</div>
                </div>
                <div class="stat">
                    <div class="stat-figure text-cyan-700">
                        <div class="avatar online">
                            <div class="w-16 rounded-full">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/>
                            </div>
                        </div>
                    </div>
                    <div class="stat-value font-bold">100%</div>
                    <div class="stat-title">Довольных клиентов</div>
                    <div class="stat-desc text-cyan-700">за 15 лет сотрудничества</div>
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 max-w-[95%] mx-auto shadow-lg p-4 mt-10"><!-- Нужно добавить еще категорий товара , и чтоб она крутилась-->
            <div class="ml-4 w-full lg:w-1/2">
                <h2 class="text-3xl font-semibold">Каталог</h2>
            </div>
            <article class="overflow-x-auto mt-2  ">
                <div class="flex snap-x snap-mandatory space-x-4 p-4">
                    @foreach($catalogs as $catalog)
                        <div class="card bg-base-200 image-full w-80 shadow-sm snap-start">
                            <figure><img src="/storage/{{$catalog->picture}}" alt="dez"/></figure>
                            <div class="card-body ">
                                <h3 class="text-2xl font-medium">{{$catalog->name}}</h3>
                                <p class="text-sm">{{$catalog->description}}</p>
                                <div class="card-actions justify-end">
                                    <a href="/catalog/{{$catalog->id}}" class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        </section>
    </main>




@endsection
