<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maimtext;
use App\Models\Catalog;

class BaseController extends Controller
{

    public function getIndex()
    {
    $catalogs=Catalog::whereNull('parent_id')->get();
    
     return view('index',compact('catalogs'));

    }
    public function getUrl($url = 'about')
    {
        $maintext = Maimtext::where('url',$url)->first();
        return view('article', compact('url','maintext'));
    }
}
