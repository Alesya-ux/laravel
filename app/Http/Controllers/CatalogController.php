<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use Auth;

class CatalogController extends Controller
{
    public function getIndex()
    {

       $catalogs = Catalog::whereNull('parent_id')->orderBy('id')->get();
       return view('catalogs', compact('catalogs'));

    }
public  function getOne(Catalog $catalog){
        return view('catalog_one', compact(var_name: 'catalog'));
}
    public  function postUserInterests(){
        abort_if(!\Illuminate\Support\Facades\Auth::user(), 403, 'Need authorization');
    }
    public  function getAddProduct(Request $request, Catalog $catalog){
        abort_if(!$request->product_id, 404,'Product_id is empty');
       // dd($catalog, $request->all());
        $catalog->products()->syncWithoutDetaching($request->product_id);
        return redirect('catalog/'. $catalog->id);


}
    public  function getDetachProduct(Request $request, Catalog $catalog){
        $catalog->products()->detach($request->product_id);
        return redirect('catalog/'. $catalog->id);
    }
}
