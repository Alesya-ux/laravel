@props(['catalog'])

<article class="group">
    <a href="{{ route('catalog.show', $catalog->id) }}" class="block">
        <!-- Изображение -->
        <div class="aspect-w-16 aspect-h-12 bg-gray-100 rounded-lg overflow-hidden mb-4">
            @if($catalog->picture && file_exists(public_path('storage/' . $catalog->picture)))
                <img src="{{ asset('storage/' . $catalog->picture) }}" 
                     alt="{{ $catalog->name }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                     loading="lazy">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-50">
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            @endif
        </div>

        <!-- Контент -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 group-hover:text-gray-700 transition-colors duration-200 mb-2">
                {{ $catalog->name }}
            </h3>
            
            @if($catalog->description)
                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                    {{ $catalog->description }}
                </p>
            @endif

            <x-catalog-content-minimal :catalog="$catalog" />
        </div>
    </a>
</article>
