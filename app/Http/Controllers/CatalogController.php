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
}
