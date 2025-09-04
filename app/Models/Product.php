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
    
    /**
     * Связь с размерами и ценами
     */
    public function sizes()
    {
        return $this->hasMany(ProductSize::class)->orderBy('price');
    }
    
    /**
     * Get the formatted price attribute (для обратной совместимости)
     */
    public function getFormattedPriceAttribute()
    {
        if (!$this->price) {
            return 'Цена не указана';
        }
        
        return number_format((float)$this->price, 2, ',', ' ') . ' руб';
    }
    
    /**
     * Get the price without currency for calculations (для обратной совместимости)
     */
    public function getNumericPriceAttribute()
    {
        return (float)$this->price;
    }
    
    /**
     * Получить цену для конкретного размера
     */
    public function getPriceForSize($size)
    {
        $productSize = $this->sizes()->where('size', $size)->first();
        return $productSize ? $productSize->price : null;
    }
    
    /**
     * Получить все размеры с ценами в виде массива
     */
    public function getSizesWithPrices()
    {
        return $this->sizes()->orderBy('price')->pluck('price', 'size')->toArray();
    }
    
    /**
     * Получить минимальную цену среди всех размеров
     */
    public function getMinPriceAttribute()
    {
        return $this->sizes->min('price');
    }
    
    /**
     * Получить максимальную цену среди всех размеров
     */
    public function getMaxPriceAttribute()
    {
        return $this->sizes->max('price');
    }
}

