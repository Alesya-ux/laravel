<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Catalog;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Отображение корзины
     */
    public function index()
    {
        $catalogs = Catalog::whereNull('parent_id')->get();
        $world = 'cart';
        
        // Получаем товары в корзине
        $cartItems = $this->getCartItems();
        
        // Вычисляем общую сумму
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        
        return view('cart', compact('catalogs', 'world', 'cartItems', 'total'));
    }

    /**
     * Добавление товара в корзину
     */
    public function add(Request $request)
    {
        try {
            // Логируем запрос для отладки
            \Log::info('Cart add request:', $request->all());
            
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'size' => 'nullable|string',
                'quantity' => 'integer|min:1|max:99'
            ]);

            $productId = $request->product_id;
            $size = $request->size;
            $quantity = $request->quantity ?? 1;

            // Получаем продукт
            $product = Product::findOrFail($productId);
            
            // Определяем цену
            $price = $this->getProductPrice($product, $size);

            if (!$price) {
                return response()->json([
                    'success' => false,
                    'message' => 'Цена для данного размера не найдена'
                ], 400);
            }

            // Проверяем, существует ли таблица cart_items
            try {
                // Пытаемся использовать модель CartItem
                \Log::info('Attempting to add to database cart');
                $this->addToCartDatabase($productId, $size, $quantity, $price);
                \Log::info('Successfully added to database cart');
            } catch (\Exception $e) {
                // Если таблица не существует, используем сессию
                \Log::info('Database cart not available, using session cart. Error: ' . $e->getMessage());
                $this->addToCartSession($productId, $size, $quantity, $price);
                \Log::info('Successfully added to session cart');
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Товар добавлен в корзину'
                ], 200, [], JSON_UNESCAPED_UNICODE);
            }

            return redirect()->back()->with('success', 'Товар добавлен в корзину');
            
        } catch (\Exception $e) {
            \Log::error('Cart add error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка при добавлении в корзину: ' . $e->getMessage()
                ], 500, [], JSON_UNESCAPED_UNICODE);
            }
            
            return redirect()->back()->with('error', 'Ошибка при добавлении в корзину');
        }
    }

    /**
     * Добавление товара в корзину через базу данных
     */
    private function addToCartDatabase($productId, $size, $quantity, $price)
    {
        $userId = Auth::id();
        $sessionId = $userId ? null : session()->getId();

        // Проверяем, есть ли уже такой товар в корзине
        $existingItem = CartItem::where('product_id', $productId)
            ->where('size', $size)
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            }, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->first();

        if ($existingItem) {
            // Увеличиваем количество
            $existingItem->increment('quantity', $quantity);
        } else {
            // Создаем новый элемент корзины
            CartItem::create([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'product_id' => $productId,
                'size' => $size,
                'price' => $price,
                'quantity' => $quantity
            ]);
        }
    }

    /**
     * Добавление товара в корзину через сессию
     */
    private function addToCartSession($productId, $size, $quantity, $price)
    {
        $cart = session()->get('cart', []);
        $key = $productId . '_' . $size;
        
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $quantity;
        } else {
            $cart[$key] = [
                'product_id' => $productId,
                'size' => $size,
                'price' => $price,
                'quantity' => $quantity
            ];
        }
        
        session()->put('cart', $cart);
    }

    /**
     * Обновление количества товара в корзине
     */
    public function update(Request $request, CartItem $cartItem)
    {
        \Log::info('Update cart item request', [
            'item_id' => $cartItem->id,
            'quantity' => $request->quantity,
            'user_id' => auth()->id(),
            'session_id' => session()->getId()
        ]);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        // Проверяем, что товар принадлежит текущему пользователю/сессии
        if (!$this->canModifyItem($cartItem)) {
            \Log::error('Cannot modify item - access denied', [
                'item_id' => $cartItem->id,
                'item_user_id' => $cartItem->user_id,
                'item_session_id' => $cartItem->session_id,
                'current_user_id' => auth()->id(),
                'current_session_id' => session()->getId()
            ]);
            abort(403);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        \Log::info('Cart item updated successfully', [
            'item_id' => $cartItem->id,
            'new_quantity' => $cartItem->quantity
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Количество обновлено',
                'item_total' => number_format($cartItem->total, 2, ',', ' ') . ' руб'
            ], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return redirect()->back()->with('success', 'Количество обновлено');
    }

    /**
     * Удаление товара из корзины
     */
    public function remove(CartItem $cartItem)
    {
        // Проверяем, что товар принадлежит текущему пользователю/сессии
        if (!$this->canModifyItem($cartItem)) {
            abort(403);
        }

        $cartItem->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Товар удален из корзины'
            ]);
        }

        return redirect()->back()->with('success', 'Товар удален из корзины');
    }

    /**
     * Очистка корзины
     */
    public function clear()
    {
        try {
            \Log::info('Clearing cart');
            
            $userId = Auth::id();
            $sessionId = $userId ? null : session()->getId();
            
            \Log::info('Clear cart - userId: ' . $userId . ', sessionId: ' . $sessionId);

            $deletedCount = CartItem::when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            }, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })->delete();
            
            \Log::info('Deleted items count: ' . $deletedCount);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Корзина очищена'
                ], 200, [], JSON_UNESCAPED_UNICODE);
            }

            return redirect()->route('cart')->with('success', 'Корзина очищена');
            
        } catch (\Exception $e) {
            \Log::error('Clear cart error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка при очистке корзины: ' . $e->getMessage()
                ], 500, [], JSON_UNESCAPED_UNICODE);
            }
            
            return redirect()->route('cart')->with('error', 'Ошибка при очистке корзины');
        }
    }

    /**
     * Получение товаров в корзине
     */
    private function getCartItems()
    {
        try {
            // Пытаемся получить из базы данных
            $userId = Auth::id();
            $sessionId = $userId ? null : session()->getId();

            return CartItem::with('product.images')
                ->when($userId, function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                }, function ($query) use ($sessionId) {
                    return $query->where('session_id', $sessionId);
                })
                ->get();
        } catch (\Exception $e) {
            // Если таблица не существует, используем сессию
            return $this->getCartItemsFromSession();
        }
    }

    /**
     * Получение товаров корзины из сессии
     */
    private function getCartItemsFromSession()
    {
        $cart = session()->get('cart', []);
        $items = collect();
        
        foreach ($cart as $key => $item) {
            $product = Product::with('images')->find($item['product_id']);
            if ($product) {
                // Создаем объект, похожий на CartItem
                $cartItem = new \stdClass();
                $cartItem->id = $key;
                $cartItem->product_id = $item['product_id'];
                $cartItem->size = $item['size'];
                $cartItem->price = $item['price'];
                $cartItem->quantity = $item['quantity'];
                $cartItem->product = $product;
                
                $items->push($cartItem);
            }
        }
        
        return $items;
    }

    /**
     * Получение количества товаров в корзине
     */
    public function getCartItemsCount()
    {
        $userId = Auth::id();
        $sessionId = $userId ? null : session()->getId();

        return CartItem::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        }, function ($query) use ($sessionId) {
            return $query->where('session_id', $sessionId);
        })->sum('quantity');
    }

    /**
     * Получение цены продукта для конкретного размера
     */
    private function getProductPrice($product, $size = null)
    {
        if ($size) {
            $productSize = ProductSize::where('product_id', $product->id)
                ->where('size', $size)
                ->first();
            
            return $productSize ? $productSize->price : null;
        }

        // Если размер не указан, возвращаем минимальную цену
        return $product->sizes->min('price') ?? (float)$product->price;
    }

    /**
     * Проверка, может ли пользователь изменить элемент корзины
     */
    private function canModifyItem($cartItem)
    {
        $userId = Auth::id();
        $sessionId = $userId ? null : session()->getId();

        if ($userId) {
            return $cartItem->user_id === $userId;
        }

        return $cartItem->session_id === $sessionId;
    }
}
