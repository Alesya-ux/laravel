@extends('layouts.tall')
@section('content')

<div class="p-6">
    <h2 class="text-3xl font-semibold">Корзина</h2>
</div>

@if($cartItems->count() > 0)
    <!-- Корзина с товарами -->
    <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[95%] mx-auto mt-10 fade-in">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Товары в корзине ({{ $cartItems->sum('quantity') }})</h2>
            </div>
            <div class="divide-y divide-gray-200">
                @foreach($cartItems as $item)
                    <div class="p-6 flex items-center space-x-4">
                        <!-- Изображение товара -->
                        <div class="flex-shrink-0">
                            @if($item->product->mainImage)
                                <img src="{{ $item->product->mainImage->image_url }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-20 h-20 object-cover rounded-lg">
                            @elseif($item->product->picture)
                                <img src="{{ asset('storage/' . $item->product->picture) }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-20 h-20 object-cover rounded-lg">
                            @else
                                <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">Нет фото</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Информация о товаре -->
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-medium text-gray-900 truncate">{{ $item->product->name }}</h3>
                            @if($item->size)
                                <p class="text-sm text-gray-500">Размер: {{ $item->size }}</p>
                            @endif
                            <p class="text-sm text-gray-600">Цена: {{ number_format($item->price, 2, ',', ' ') }} руб</p>
                        </div>
                        
                        <!-- Управление количеством -->
                        <div class="flex items-center space-x-2">
                            <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                    class="w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-gray-600">-</span>
                            </button>
                            <span class="w-8 text-center font-medium">{{ $item->quantity }}</span>
                            <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                    class="w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-gray-600">+</span>
                            </button>
                        </div>
                        
                        <!-- Общая стоимость позиции -->
                        <div class="text-right">
                            <p class="text-lg font-semibold text-gray-900">{{ number_format($item->price * $item->quantity, 2, ',', ' ') }} руб</p>
                        </div>
                        
                        <!-- Кнопка удаления -->
                        <button onclick="removeItem({{ $item->id }})" 
                                class="text-red-500 hover:text-red-700 p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-gray-50 mt-6">
            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold">Итого:</span>
                <span class="text-2xl font-bold text-cyan-700">{{ number_format($total, 2, ',', ' ') }} руб</span>
            </div>
            <div class="flex gap-4 mt-4">
                <button class="btn bg-red-600 hover:bg-red-700 text-white flex-1" onclick="clearCart()">
                    Очистить корзину
                </button>
                <button class="btn bg-cyan-700 hover:bg-cyan-800 text-white flex-1">
                    Оформить заказ
                </button>
            </div>
        </div>
    </section>

    <!-- Блок итогов -->
   

@else
    <!-- Пустая корзина -->
    <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[95%] mx-auto mt-10 fade-in">
        <div class="flex gap-6">   
            <div class="shadow-2xl hover-lift bg-white p-6 rounded-2xl h-full flex-1">
                <h2 class="text-xl font-semibold text-gray-600 mb-2 cart-text">Ваша корзина пуста</h2>
                <p class="text-gray-500 mb-6 cart-description">Добавьте товары из каталога, чтобы начать покупки</p>
                <div class="flex justify-end mr-4">
                    <a href="/catalog" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-3 py-2 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold">Перейти в каталог</a>                     
                </div>
            </div>
        </div>
    </section>
@endif

<script>
function updateQuantity(itemId, newQuantity) {
    console.log('updateQuantity вызвана с параметрами: itemId=' + itemId + ', newQuantity=' + newQuantity);
    
    if (newQuantity < 1) {
        removeItem(itemId);
        return;
    }
    
    console.log('Отправляем запрос на /cart/update/' + itemId);
    
    fetch(`/cart/update/${itemId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            quantity: newQuantity
        })
    })
    .then(response => {
        console.log('Получен ответ от сервера:', response.status);
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('HTTP ' + response.status);
        }
    })
    .then(data => {
        console.log('Данные от сервера:', data);
        if (data.success) {
            console.log('Успешно обновлено, перезагружаем страницу');
            location.reload();
        } else {
            console.log('Сервер вернул ошибку:', data);
            alert('Ошибка: ' + (data.message || 'Неизвестная ошибка'));
        }
    })
    .catch(error => {
        console.error('Ошибка при обновлении количества:', error);
        alert('Ошибка: ' + error.message);
    });
}

function removeItem(itemId) {
    console.log('removeItem called with:', itemId);
    
    if (confirm('Удалить товар из корзины?')) {
        fetch(`/cart/remove/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('Remove response status:', response.status);
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('HTTP ' + response.status);
            }
        })
        .then(data => {
            console.log('Remove response data:', data);
            if (data.success) {
                console.log('Успешно удалено, перезагружаем страницу');
                location.reload();
            } else {
                console.log('Сервер вернул ошибку:', data);
            }
        })
        .catch(error => {
            console.error('Remove error:', error);
            // В случае ошибки, все равно перезагружаем страницу, чтобы увидеть актуальное состояние
            location.reload();
        });
    }
}

function clearCart() {
    if (confirm('Очистить всю корзину?')) {
        fetch('/cart/clear', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('Clear response status:', response.status);
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('HTTP ' + response.status);
            }
        })
        .then(data => {
            console.log('Clear response data:', data);
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Clear error:', error);
            alert('Ошибка: ' + error.message);
        });
    }
}
</script>

@endsection 