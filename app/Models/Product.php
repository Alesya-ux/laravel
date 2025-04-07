<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class, 'catalog_product');
    }
}

