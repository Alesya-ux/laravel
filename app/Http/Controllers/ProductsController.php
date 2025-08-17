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
        
        $size_arr = [];
        if($product->size){
            $size_arr = explode('/', $product->size);
        }
        
        return view('product', compact('product', 'size_arr', 'catalogs', 'world'));
    }
}
