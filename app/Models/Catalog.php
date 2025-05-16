<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['name', 'parent_id', 'picture', 'description'];


public function childs()
{
    return $this->hasMany(Catalog::class, 'parent_id');
}

public function parent()
{
    return $this->belongsTo(Catalog::class, 'parent_id');
}
    public function products()
    {
        return $this->belongsToMany(Product::class, 'catalog_product');
    }

}
