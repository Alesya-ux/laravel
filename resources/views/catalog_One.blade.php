@extends('layouts.tall')
@section('content')

    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Сделать SEO-->

    <main>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">

            <div class="ml-4 w-full lg:w-1/2  ">
                <h2 class="text-3xl font-semibold">
                    @if($catalog->parent)
                        <a href="/catalog/{{$catalog->parent->id}}"
                           class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link"
                           data-section="section1">{{$catalog->parent->name}} </a>
                    @endif
                    {{$catalog->name}}</h2>
            </div>
            <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row  ">
                <aside class="w-full md:w-1/4 bg-neutral-50 rounded-md p-4 mb-4 md:mb-0 md:mr-4 shadow-md">
                    фильтр
                </aside><!-- Фильтр -->
                <div class="container mx-auto ">
                    <div class="bg-white rounded-lg shadow-xl p-6"> Описание</div>
                    <article class="w-full mt-6">
                        @if($catalog->products && count($catalog->products) > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($catalog->products as $product)
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                        <a href="/product/{{$product->id}}">
                                            <img src="{{ asset('storage/' . $product->picture) }}"
                                                 alt="{{ $product->name }}"
                                                 class="w-full h-48 object-cover object-center">
                                        </a>
                                        <div class="p-4">
                                            <h3 class="text-base font-medium">
                                                <a href="/product/{{$product->id}}"
                                                   class="hover:text-cyan-700 transition duration-200">{{ $product->name }}</a>
                                            </h3>
                                            <p class="mt-2 text-sm"> {{ $product->price }} рублей</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white rounded-md p-6 shadow-md">
                                <p class="text-gray-500">В этой категории нет товаров.</p>
                            </div>
                        @endif
                    </article>
                </div> <!-- Добавить блок описания -->
            </div>
        </section>

        <aside class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
            <div class="collapse bg-base-100 border-base-300 border mt-2 ">
                <input type="checkbox"/>
                <div class="collapse-title font-semibold">Дезковрик или дезбарье?</div>
                <div class="collapse-content text-sm">
                    Click the "Sign Up" button in the top right corner and follow the registration process.
                </div>
            </div>
            <div class="collapse bg-base-100 border-base-300 border mt-2 ">
                <input type="checkbox"/>
                <div class="collapse-title font-semibold">?</div>
                <div class="collapse-content text-sm">
                    Click the "Sign Up" button in the top right corner and follow the registration process.
                </div>
            </div>
        </aside><!-- Добавить блок для вопросов -->

    </main>

@endsection
