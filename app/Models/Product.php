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
     * Связь с изображениями
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->ordered();
    }
    
    /**
     * Получить главное изображение
     */
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }
    
    /**
     * Получить дополнительные изображения
     */
    public function additionalImages()
    {
        return $this->hasMany(ProductImage::class)->where('is_main', false)->ordered();
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
     * Парсит строку цен с различными разделителями
     * Поддерживает: /, ,, ;, |
     */
    public function parsePrices()
    {
        if (!$this->price) {
            return [];
        }
        
        $price = trim($this->price);
        $separators = ['/', ',', ';', '|'];
        
        foreach ($separators as $separator) {
            if (strpos($price, $separator) !== false) {
                return array_map('trim', explode($separator, $price));
            }
        }
        
        return [trim($price)];
    }
    
    /**
     * Получить первую (минимальную) цену из строки
     */
    public function getFirstPrice()
    {
        $prices = $this->parsePrices();
        return !empty($prices) ? (float)trim($prices[0]) : null;
    }
    
    /**
     * Получить отформатированную первую цену для отображения
     */
    public function getFormattedFirstPrice()
    {
        $firstPrice = $this->getFirstPrice();
        if ($firstPrice === null) {
            return 'Цена не указана';
        }
        
        return 'от ' . number_format($firstPrice, 2, ',', ' ') . ' руб';
    }
    
    /**
     * Получить все цены в виде массива чисел
     */
    public function getAllPrices()
    {
        $prices = $this->parsePrices();
        return array_map(function($price) {
            return (float)trim($price);
        }, $prices);
    }
    
    /**
     * Получить минимальную цену из всех цен
     */
    public function getMinPriceFromString()
    {
        $prices = $this->getAllPrices();
        return !empty($prices) ? min($prices) : null;
    }
    
    /**
     * Получить максимальную цену из всех цен
     */
    public function getMaxPriceFromString()
    {
        $prices = $this->getAllPrices();
        return !empty($prices) ? max($prices) : null;
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
    
    /**
     * Получить URL главного изображения (с обратной совместимостью)
     */
    public function getMainImageUrlAttribute()
    {
        // Сначала пробуем получить из новой системы
        $mainImage = $this->mainImage;
        if ($mainImage) {
            return $mainImage->image_url;
        }
        
        // Если нет, используем старое поле picture
        if ($this->picture) {
            return asset('storage/' . $this->picture);
        }
        
        return null;
    }
    
    /**
     * Получить все изображения в правильном порядке
     */
    public function getAllImagesOrdered()
    {
        return $this->images()->ordered()->get();
    }
    
    /**
     * Проверить, есть ли дополнительные изображения
     */
    public function hasAdditionalImages()
    {
        return $this->additionalImages()->count() > 0;
    }
    
}

