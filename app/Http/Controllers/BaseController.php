<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maimtext;
use App\Models\Catalog;

class BaseController extends Controller
{

    public function getIndex()
    {
        $catalogs = Catalog::whereNull('parent_id')->get();
        $world = 'home';
        
        return view('index', compact('catalogs', 'world'));
    }
    
    public function getUrl($url = 'about')
    {
        $catalogs = Catalog::whereNull('parent_id')->get();
        $maintext = Maimtext::where('url', $url)->first();
        $world = $url;
        
        return view('article', compact('url', 'maintext', 'catalogs', 'world'));
    }
}
