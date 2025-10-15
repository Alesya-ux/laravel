@props(['catalog'])

@if($catalog->childs && $catalog->childs->count() > 0)
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            Подкатегории
        </h4>
        <div class="space-y-2">
            @foreach($catalog->childs->take(3) as $child)
                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-cyan-500 rounded-full flex-shrink-0"></div>
                    <a href="{{ route('catalog.show', $child->id) }}" 
                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1 truncate">
                        {{ $child->name }}
                    </a>
                </div>
            @endforeach
            @if($catalog->childs->count() > 3)
                <div class="text-xs text-gray-400 text-center pt-2">
                    И ещё {{ $catalog->childs->count() - 3 }} подкатегорий
                </div>
            @endif
        </div>
    </div>
@elseif($catalog->products && $catalog->products->count() > 0)
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            Товары
        </h4>
        <div class="space-y-2">
            @foreach($catalog->products->take(3) as $product)
                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-cyan-500 rounded-full flex-shrink-0"></div>
                    <a href="{{ route('product.show', $product->id) }}" 
                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1 truncate">
                        {{ $product->name }}
                    </a>
                </div>
            @endforeach
            @if($catalog->products->count() > 3)
                <div class="text-xs text-gray-400 text-center pt-2">
                    И ещё {{ $catalog->products->count() - 3 }} товаров
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
