@extends('layouts.tall')
@section('content')

    <header>

    </header>


    <main class=>

        <div class="mt-20 ml-4 w-full lg:w-1/2">
            <h2 class=text-3xl font-bold text-base-200>Каталог</h2>
        </div>
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-row items-center gap-4">
                <!-- Изображение -->
                <div class="flex-shrink-0">
                    <img src="pictures/dinamika/korzina.png" alt="Описание изображения" class="h-auto object-contain max-w-full">
                </div>
                <!-- Текст -->
                <div class="text-gray-700 leading-relaxed">
                    <p class="text-xl">
                        Представляем наш каталог продукции, предназначенной для поддержания чистоты и гигиены на вашем предприятии.
                        Здесь вы найдете широкий ассортимент дезинфицирующих средств, оборудования и аксессуаров, необходимых для
                        обеспечения безопасности и соответствия санитарным нормам.
                    </p>
                    <p class="mt-4">
                        Мы предлагаем эффективные решения для различных отраслей, включая пищевую промышленность, здравоохранение,
                        образование и многие другие. Наши продукты разработаны с учетом самых высоких требований к качеству и
                        безопасности.
                    </p>
                </div>
            </div>
        </div>


        <div class="container mx-auto px-4 py-8">
            <div class="px-[100px]">
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($catalogs as $catalog)
                        <div class="card bg-base-100 image-full shadow-sm">

                            <div class="card-body">
                                <h3 class="card-title"><a href="{{asset('catalog/'.$catalog->id)}}">{{$catalog->name}}</a></h3>
                                <div class="card-actions justify-end">
                                    @if($catalog->childs)
                                        <ul class="space-y-2">

                                            @foreach($catalog->childs as $child)
                                                <li>

                                                    <a href="/catalog/{{$child->id}}" class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link" data-section="section1">
                                                        {{$child->name}}
                                                    </a>
                                                </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </main>




@endsection
