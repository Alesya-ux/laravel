<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maimtext;

class BaseController extends Controller
{

    public function getIndex()
    {
     return view('index');

    }
    public function getUrl($url = 'about')
    {
        $maintext = Maimtext::where('url',$url)->first();
        return view('article', compact('url','maintext'));
    }
}
