@extends('layouts.tall')
@section('content')



    <header>
        <div class="hero mt-10 relative overflow-hidden" style="min-h-200">
            <div class="hero-bg absolute top-0 left-0 w-full h-full z-0" style="background-image: url('/pictures/forma.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
            <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                <img
                    src="/pictures/maskot/maskot.png"
                    class="max-w-sm h-96 object-cover rounded-lg " alt="maskot"/>
                <div>
                    <h1 class="text-5xl font-bold">АДЕНТИНА СЕРВИС</h1>
                    <p class="py-6">
                        Защита от вирусов и бактерий: дезинфицирующее оборудование и ковры для предприятий!
                    </p>
                    <a href="/catalog" class="btn btn-soft bg-cyan-700 text-base-200">Каталог</a>
                </div>
            </div>
        </div>
    </header>




    <main class="">
    <div class="mt-10 ml-4 w-full lg:w-1/2">
        <h2 class=text-3xl font-bold text-base-200>О Нас</h2>
    </div>
        <div class="flex w-full flex-col lg:flex-row p-4 gap-4 mt-6 max-w-screen-lg mx-auto">
            <div class="card bg-cyan-700 rounded-box grid flex-1 place-items-stretch">
                <div class="flex flex-col h-full">
                    <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200">
                        <img src="/pictures/iconki/dostavka2.png" alt="Иконка моментальной отгрузки" />
                        <p class="p-6 text-xl">Моментальная отгрузка</p>
                        <p class="text-xs">Отгрузка вашего товара в течении минуты после оплаты!</p>
                    </div>
                    <div class="p-4 flex-grow border-b border-base-300 flex items-center text-base-200">
                        <img src="/pictures/iconki/nalichie2.png" alt="Иконка актуального наличия" />
                        <p class="p-6 text-xl">Актуальное наличие</p>
                        <p class="text-xs">Наличие товара и все цены на сайте всегда актуальны!</p>
                    </div>
                    <div class="p-4 flex-grow flex items-center text-base-200">
                        <img src="/pictures/iconki/sertificat2.png" alt="Иконка комплекта документов" />
                        <p class="p-6 text-xl">Комплект документов</p>
                        <p class="text-xs">Полный пакет документов, максимально быстрая обработка заказов!</p>
                    </div>
                </div>
            </div>
            <div class="card bg-base-200 rounded-box grid flex-1 place-items-center">
                <p class="text-left break-words max-w-full w-full p-4">
                    Мы – надежный поставщик профессиональных дезинфицирующих средств и оборудования, предназначенных для обеспечения безопасности и гигиены в вашем бизнесе.
                    В современном мире, где чистота и санитария играют ключевую роль, мы предлагаем широкий ассортимент высококачественных продуктов и передовых решений для дезинфекции помещений и оборудования любого масштаба. От небольших офисов до крупных промышленных предприятий – мы поможем вам создать безопасную и здоровую среду для ваших сотрудников и клиентов.
                </p>
            </div>
        </div>

        <div class="stats shadow w-full mt-20">
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
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
            </div>
            <div class="stat-value font-bold">100%</div>
            <div class="stat-title">Довольных клиентов</div>
            <div class="stat-desc text-cyan-700">за 15 лет сотрудничества</div>
        </div>
    </div>


    <div class="mt-20 ml-4 w-full lg:w-1/2">
        <h2 class=text-3xl font-bold text-base-200>Каталог</h2>
    </div>
    <div class="overflow-x-auto mt-6  ">
        <div class="flex snap-x snap-mandatory space-x-4 p-4">
            <div class="card bg-base-100 image-full w-96 shadow-sm snap-start">
                <figure><img src="pictures/karusel/dez.png" alt="dez" /></figure>
                <div class="card-body ">
                    <h3 class="card-title ">Дезковрики и антибактериальные коврики</h3>
                    <p class="text-sm ">Использование дезковриков, дезбарьеров и дезматов позволяет добиться высокой защиты на производствах, которые требуют соблюдения чистоты.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</button>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 image-full w-96 shadow-sm snap-start">
                <figure><img src="pictures/karusel/mis.png" alt="mis" /></figure>
                <div class="card-body">
                    <h3 class="card-title">Оборудование для дезинфекции</h3>
                     <p class="text-sm">Оборудование для дезинфекцииотлично подходит для обработки больших территорий, таких как склады, торговые площади и производственные линии.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</button>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 image-full w-96 shadow-sm snap-start">
                <figure><img src="pictures/karusel/lok.png" alt="lok" /></figure>
                <div class="card-body">
                    <h3 class="card-title">Дозаторы</h3>
                    <p class="text-sm">Диспенсер или дозатор – удобный промышленный аксессуар, позволяющий рационально расходовать моющее средство и обеспечивать максимальную гигиеничность процедуры.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</button>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 image-full w-96 shadow-sm snap-start">
                <figure><img src="pictures/karusel/conferum.png" alt="conferum" /></figure>
                <div class="card-body">
                    <h3 class="card-title">Перекись</h3>
                    <p class="text-sm">Водный раствор перекиси водорода, стабилизированный</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</button>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 image-full w-96 shadow-sm snap-start">
                <figure><img src="pictures/karusel/lega.png" alt="lega" /></figure>
                <div class="card-body">
                    <h3 class="card-title">Преобразователь.Обезжириватель</h3>
                    <p class="text-sm">Преобразование ржавчины, а так же удаление консервационных смазок, СОЖ, эксплуатационных загрязнений нефтяного, жирового, масляного, почвенного происхождения, пыли, копоти с металлических и других щелочестойких поверхностей, различными методами очистки. </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




@endsection
