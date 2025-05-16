@extends('layouts.tall')
@section('content')

    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Добавить SEO -->

    <body>

    <main>
        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold">Каталог</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($catalogs as $catalog)
                        <div class="relative bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 mt-2 overflow-hidden">
                            <img src="{{ asset('storage/' . $catalog->picture) }}" alt="{{ $catalog->name }}" class="absolute inset-0 w-full h-full object-cover opacity-20">
                            <div class="p-6 relative z-10">
                                <p class="text-sm font-medium">
                                    <a href="{{ asset('catalog/' . $catalog->id) }}"
                                       class="hover:text-cyan-700 transition duration-200">{{ $catalog->name }}</a>
                                </p>
                                @if($catalog->products)
                                    <ul class="space-y-2 mt-2">
                                        @foreach($catalog->products as $product)
                                            <li>
                                                <a href="/catalog/{{ $product->id }}"
                                                   class="block py-2 px-4 rounded-md hover:bg-cyan-700 hover:text-base-200 transition duration-200 text-gray-700 text-sm relative z-10">
                                                    {{ $product->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div> <!-- В подкатегории не правильно выводит-->
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
        </section> <!-- Что-то добавить -->

    </main>

    </body>

@endsection
