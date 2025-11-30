<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Faq;
use App\Models\Product;

/**
 * Публичный контроллер каталога: вывод категорий, просмотр и привязка товаров.
 */
class CatalogController extends Controller
{
    /**
     * Список корневых категорий.
     */
    public function getIndex()
    {
        // Оптимизированная загрузка данных с ограничением
        $catalogs = Catalog::whereNull('parent_id')
            ->with([
                'childs' => function($query) {
                    $query->select('id', 'name', 'parent_id')->limit(3);
                },
                'products' => function($query) {
                    $query->select('products.id', 'products.name')->limit(3);
                }
            ])
            ->select('id', 'name', 'picture', 'description')
            ->orderBy('name')
            ->get();
        
        $world = 'catalog';
        
        return view('catalogs', compact('catalogs', 'world'));
    }
    
    /**
     * Просмотр конкретной категории.
     */
    public function getOne(Catalog $catalog){
        $catalogs = Catalog::whereNull('parent_id')->orderBy('id')->get();
        $world = 'catalog';
        
        // Загружаем продукты с изображениями и метками
        $catalog->load(['products.images', 'products.mainImage', 'products.tags']);
        
        // Загружаем только те теги, которые используются товарами в этой категории
        $productIds = $catalog->products->pluck('id')->toArray();
        $tags = collect();
        
        if (!empty($productIds)) {
            $tags = \App\Models\Tag::active()
                ->whereHas('products', function($query) use ($productIds) {
                    $query->whereIn('products.id', $productIds);
                })
                ->ordered()
                ->get();
        }
        
        // Загружаем FAQ для этой категории и общие FAQ
        $faqs = Faq::active()
            ->where(function($query) use ($catalog) {
                $query->where('category_id', $catalog->id)
                      ->orWhereNull('category_id'); // Общие FAQ
            })
            ->ordered()
            ->get();
        
        return view('catalog_one', compact('catalog', 'catalogs', 'world', 'faqs', 'tags'));
    }
    
    /**
     * Привязать товар к категории (POST).
     */
    public function attachProduct(Request $request, Catalog $catalog){
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $catalog->products()->syncWithoutDetaching($validated['product_id']);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Продукт привязан к каталогу',
            ]);
        }

        return redirect()
            ->route('catalog.show', $catalog)
            ->with('success', 'Продукт добавлен в каталог');
    }
    /**
     * Отвязать товар от категории (DELETE).
     */
    public function detachProduct(Request $request, Catalog $catalog, Product $product){
        $catalog->products()->detach($product->id);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Продукт отвязан от каталога',
            ]);
        }

        return redirect()
            ->route('catalog.show', $catalog)
            ->with('success', 'Продукт удалён из каталога');
    }
}
