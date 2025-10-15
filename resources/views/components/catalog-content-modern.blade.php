@props(['catalog'])

@if($catalog->childs && $catalog->childs->count() > 0)
    <div class="mb-6">
        <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h4 class="text-lg font-semibold text-gray-800">Подкатегории</h4>
        </div>
        
        <div class="space-y-3">
            @foreach($catalog->childs->take(3) as $child)
                <div class="group/item flex items-center p-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300 border border-transparent hover:border-blue-200">
                    <div class="w-2 h-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex-shrink-0 mr-3 group-hover/item:scale-125 transition-transform duration-300"></div>
                    <a href="{{ route('catalog.show', $child->id) }}" 
                       class="text-sm text-gray-700 hover:text-blue-600 transition-colors duration-300 flex-1 truncate font-medium group-hover/item:text-blue-600">
                        {{ $child->name }}
                    </a>
                    <svg class="w-4 h-4 text-gray-400 group-hover/item:text-blue-500 group-hover/item:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            @endforeach
            
            @if($catalog->childs->count() > 3)
                <div class="text-center pt-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700">
                        +{{ $catalog->childs->count() - 3 }} ещё
                    </span>
                </div>
            @endif
        </div>
    </div>
@elseif($catalog->products && $catalog->products->count() > 0)
    <div class="mb-6">
        <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h4 class="text-lg font-semibold text-gray-800">Товары</h4>
        </div>
        
        <div class="space-y-3">
            @foreach($catalog->products->take(3) as $product)
                <div class="group/item flex items-center p-3 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-300 border border-transparent hover:border-green-200">
                    <div class="w-2 h-2 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex-shrink-0 mr-3 group-hover/item:scale-125 transition-transform duration-300"></div>
                    <a href="{{ route('product.show', $product->id) }}" 
                       class="text-sm text-gray-700 hover:text-green-600 transition-colors duration-300 flex-1 truncate font-medium group-hover/item:text-green-600">
                        {{ $product->name }}
                    </a>
                    <svg class="w-4 h-4 text-gray-400 group-hover/item:text-green-500 group-hover/item:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            @endforeach
            
            @if($catalog->products->count() > 3)
                <div class="text-center pt-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-green-100 to-emerald-100 text-green-700">
                        +{{ $catalog->products->count() - 3 }} ещё
                    </span>
                </div>
            @endif
        </div>
    </div>
@else
    <div class="text-center py-8">
        <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
        </div>
        <h5 class="text-lg font-semibold text-gray-600 mb-2">В разработке</h5>
        <p class="text-sm text-gray-500">Товары скоро появятся</p>
    </div>
@endif
