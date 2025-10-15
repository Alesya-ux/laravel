@props(['catalog'])

<article class="group relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border border-gray-100">
    <!-- Изображение -->
    <div class="relative h-56 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
        @if($catalog->picture && file_exists(public_path('storage/' . $catalog->picture)))
            <img src="{{ asset('storage/' . $catalog->picture) }}" 
                 alt="{{ $catalog->name }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                 loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-purple-50">
                <div class="text-center">
                    <svg class="w-16 h-16 text-blue-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <p class="text-sm text-blue-400 font-medium">Изображение</p>
                </div>
            </div>
        @endif
        
        <!-- Градиентный оверлей -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
        
        <!-- Заголовок на изображении -->
        <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-cyan-200 transition-colors duration-300">
                {{ $catalog->name }}
            </h3>
            @if($catalog->description)
                <p class="text-sm text-white/90 line-clamp-2 group-hover:text-white transition-colors duration-300">
                    {{ Str::limit($catalog->description, 100) }}
                </p>
            @endif
        </div>

        <!-- Декоративный элемент -->
        <div class="absolute top-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </div>
    </div>
    
    <!-- Контент -->
    <div class="p-6">
        <x-catalog-content-modern :catalog="$catalog" />
        
        <!-- Кнопка перехода -->
        <div class="mt-6">
            <a href="{{ route('catalog.show', $catalog->id) }}" 
               class="group/btn block w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-center py-3 px-6 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <span class="flex items-center justify-center">
                    Перейти в категорию
                    <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>

    <!-- Блестящий эффект при наведении -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
</article>
