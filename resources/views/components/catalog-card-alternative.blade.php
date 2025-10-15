@props(['catalog'])

<article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
    <!-- Изображение -->
    <div class="relative h-48 overflow-hidden bg-gray-50">
        @if($catalog->picture && file_exists(public_path('storage/' . $catalog->picture)))
            <img src="{{ asset('storage/' . $catalog->picture) }}" 
                 alt="{{ $catalog->name }}" 
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105"
                 loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        @endif
        
        <!-- Альтернативный вариант с полупрозрачным фоном -->
        <div class="absolute bottom-0 left-0 right-0 p-4">
            <div class="bg-black/70 backdrop-blur-sm rounded-lg p-3">
                <h3 class="text-xl font-bold text-white mb-1">{{ $catalog->name }}</h3>
                @if($catalog->description)
                    <p class="text-sm text-white/90 line-clamp-2">{{ Str::limit($catalog->description, 80) }}</p>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Контент -->
    <div class="p-6">
        <x-catalog-content :catalog="$catalog" />
        
        <!-- Кнопка перехода -->
        <div class="mt-6">
            <a href="{{ route('catalog.show', $catalog->id) }}" 
               class="block w-full bg-cyan-700 hover:bg-cyan-600 text-white text-center py-3 px-4 rounded-lg font-medium transition-colors duration-200">
                Перейти в категорию
            </a>
        </div>
    </div>
</article>
