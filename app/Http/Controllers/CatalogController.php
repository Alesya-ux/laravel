<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Faq;
use Auth;

class CatalogController extends Controller
{
    public function getIndex()
    {
        // Загружаем подкатегории и товары для каждой категории
        $catalogs = Catalog::whereNull('parent_id')
            ->with(['childs', 'products'])
            ->orderBy('id')
            ->get();
        $world = 'catalog';
        
        return view('catalogs', compact('catalogs', 'world'));
    }
    
    public function getOne(Catalog $catalog){
        $catalogs = Catalog::whereNull('parent_id')->orderBy('id')->get();
        $world = 'catalog';
        
        // Загружаем FAQ для этой категории и общие FAQ
        $faqs = Faq::active()
            ->where(function($query) use ($catalog) {
                $query->where('category_id', $catalog->id)
                      ->orWhereNull('category_id'); // Общие FAQ
            })
            ->ordered()
            ->get();
        
        return view('catalog_one', compact('catalog', 'catalogs', 'world', 'faqs'));
    }
    
    
    public function getAddProduct(Request $request, Catalog $catalog){
        abort_if(!$request->product_id, 404,'Product_id is empty');
       // dd($catalog, $request->all());
        $catalog->products()->syncWithoutDetaching($request->product_id);
        return redirect('catalog/'. $catalog->id);
    }
    
    public function getDetachProduct(Request $request, Catalog $catalog){
        $catalog->products()->detach($request->product_id);
        return redirect('catalog/'. $catalog->id);
    }
}
