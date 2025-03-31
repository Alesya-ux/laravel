@extends('layouts.tall')
@section('content')

    <header>
        <div class="hero mt-10 relative overflow-hidden" style="min-h-200;">
            <div class="hero-bg absolute top-0 left-0 w-full h-full z-0" style="background-image: url('/pictures/forma.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
            <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                <img
                    src="/pictures/maskot/maskot.png"
                    class="max-w-sm h-96 object-cover rounded-lg " />
                <div>
                    <h1 class="text-5xl font-bold">АДЕНТИНА СЕРВИС</h1>
                    <p class="py-6">
                        Защита от вирусов и бактерий: дезинфицирующее оборудование и ковры для предприятий!
                    </p>
                    <button class="btn btn-soft bg-cyan-700 text-base-200">Каталог</button>
                </div>
            </div>
        </div>
    </header>


    <main class=>

        <div class="mt-20 ml-4 w-full lg:w-1/2">

            <h2 class="text-3xl font-bold text-base-500">Каталог</h2>

        </div>
        <div class="mb-6 text-gray-700">
            <p>
                Представляем наш каталог продукции, предназначенной для поддержания чистоты и гигиены на вашем предприятии.
                Здесь вы найдете широкий ассортимент дезинфицирующих средств, оборудования и аксессуаров, необходимых для
                обеспечения безопасности и соответствия санитарным нормам.
            </p>
            <p>
                Мы предлагаем эффективные решения для различных отраслей, включая пищевую промышленность, здравоохранение,
                образование и многие другие. Наши продукты разработаны с учетом самых высоких требований к качеству и
                безопасности.
            </p>
        </div>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($catalogs as $catalog)
            <div class="card bg-base-100 image-full shadow-sm">
                <figure><img src="pictures/karusel/lega.png" alt="Преобразователь.Обезжириватель" /></figure>
                <div class="card-body">
                    <h3 class="card-title"><a href="{{asset('catalog/'.$catalog->id)}}">{{$catalog->name}}</a></h3>
                    <div class="card-actions justify-end">
                        <a href="{{asset('catalog/'.$catalog->id)}}" class="btn btn-soft bg-cyan-700 text-base-200">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </main>




@endsection
