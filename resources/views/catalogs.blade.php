@extends('layouts.tall')
@section('content')

    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Добавить SEO -->

    <main>
        <h2 class="text-3xl font-semibold text-gray-800 p-6" style="display: block !important; visibility: visible !important; opacity: 1 !important;">Каталог</h2> 
        
        <section class=" py-4 rounded-lg bg-gradient-to-br from-gray-50 to-white shadow-xl max-w-[95%] mx-auto  fade-in section-shadow   ">
          
        <div class="container mx-auto px-4 ">
                
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($catalogs as $catalog)
                        <div class=" group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
                            <!-- Изображение -->
                            <div class="relative h-56 overflow-hidden bg-white">
                                <img src="{{ asset('storage/' . $catalog->picture) }}" 
                                     alt="{{ $catalog->name }}" 
                                     class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $catalog->name }}</h3>

                                </div>
                            </div>
                            
                            <!-- Контент -->
                            <div class="p-6 ">
                                @if($catalog->childs && count($catalog->childs) > 0)
                                    <div class="mb-4">
                                        
                                        <div class="space-y-2">
                                            @foreach($catalog->childs->take(3) as $child)
                                                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                                                    <a href="/catalog/{{ $child->id }}" 
                                                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1">
                                                        {{ $child->name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                            @if(count($catalog->childs) > 3)
                                                <div class="text-xs text-gray-400 text-center pt-2">
                                                    И ещё {{ count($catalog->childs) - 3 }} подкатегорий
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($catalog->products && count($catalog->products) > 0)
                                    <div class="mb-4">
                                        
                                        <div class="space-y-2">
                                            @foreach($catalog->products->take(3) as $product)
                                                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                                                    <a href="/product/{{ $product->id }}" 
                                                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                            @if(count($catalog->products) > 3)
                                                <div class="text-xs text-gray-400 text-center pt-2">
                                                    И ещё {{ count($catalog->products) - 3 }} товаров
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 text-sm">Товары в разработке</p>
                                    </div>
                                @endif
                                
                                <!-- Кнопка перехода -->
                                <div class="mt-6">
                                    <a href="/catalog/{{ $catalog->id }}" 
                                       class="btn bg-cyan-700 hover:bg-cyan-600 text-white w-full">
                                        Перейти в категорию
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        

    </main>

@endsection
