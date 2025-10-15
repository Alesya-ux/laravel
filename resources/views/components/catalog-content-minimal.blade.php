@props(['catalog'])

@if($catalog->childs && $catalog->childs->count() > 0)
    <div class="space-y-2">
        @foreach($catalog->childs->take(4) as $child)
            <div class="flex items-center text-sm text-gray-600">
                <div class="w-1 h-1 bg-gray-400 rounded-full mr-2 flex-shrink-0"></div>
                <a href="{{ route('catalog.show', $child->id) }}" 
                   class="hover:text-gray-900 transition-colors duration-200 truncate">
                    {{ $child->name }}
                </a>
            </div>
        @endforeach
        @if($catalog->childs->count() > 4)
            <div class="text-xs text-gray-400">
                +{{ $catalog->childs->count() - 4 }} ещё
            </div>
        @endif
    </div>
@elseif($catalog->products && $catalog->products->count() > 0)
    <div class="space-y-2">
        @foreach($catalog->products->take(4) as $product)
            <div class="flex items-center text-sm text-gray-600">
                <div class="w-1 h-1 bg-gray-400 rounded-full mr-2 flex-shrink-0"></div>
                <a href="{{ route('product.show', $product->id) }}" 
                   class="hover:text-gray-900 transition-colors duration-200 truncate">
                    {{ $product->name }}
                </a>
            </div>
        @endforeach
        @if($catalog->products->count() > 4)
            <div class="text-xs text-gray-400">
                +{{ $catalog->products->count() - 4 }} ещё
            </div>
        @endif
    </div>
@else
    <div class="text-sm text-gray-400 italic">
        Товары в разработке
    </div>
@endif
