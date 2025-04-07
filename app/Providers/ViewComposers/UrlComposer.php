<?php

namespace App\Providers\ViewComposers;

use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use App\Models\Catalog;
class UrlComposer
{
    public function compose(View $view)
    {
       $uri_arr = explode('/',$_SERVER['REQUEST_URI']) ;
       $catalogs = Catalog :: whereNull('parent_id')->get();
       $view->with('world',end($uri_arr))->with('home',$uri_arr[1])->with('catalogs',$catalogs);
    }
}
