<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalog;

class ProductsController extends Controller
{
    public function getOne(Product $product){
        $catalogs = Catalog::whereNull('parent_id')->orderBy('id')->get();
        $world = 'product';
        
        // Загружаем размеры с ценами и изображения
        $product->load(['sizes', 'images', 'mainImage']);
        
        // Получаем размеры из новой таблицы или из старого поля (для обратной совместимости)
        $size_arr = [];
        $sizes_with_prices = [];
        
        if($product->sizes->count() > 0) {
            // Используем новую систему размеров с сортировкой по цене
            $size_arr = $product->sizes->sortBy('price')->pluck('size')->toArray();
            $sizes_with_prices = $product->sizes->sortBy('price')->pluck('price', 'size')->toArray();
        } elseif($product->size) {
            // Обратная совместимость со старой системой
            $size_arr = explode('/', $product->size);
            // Создаем массив с одинаковой ценой для всех размеров
            foreach($size_arr as $size) {
                $sizes_with_prices[trim($size)] = $product->numeric_price;
            }
        }
        
        return view('product', compact('product', 'size_arr', 'sizes_with_prices', 'catalogs', 'world'));
    }
}
