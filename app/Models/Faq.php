<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question', 
        'answer', 
        'category_id', 
        'product_ids',
        'sort_order', 
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'product_ids' => 'array',
    ];
    

    /**
     * Связь с категорией каталога
     */
    public function category()
    {
        return $this->belongsTo(Catalog::class, 'category_id');
    }

    /**
     * Scope для активных FAQ
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope для FAQ конкретной категории
     */
    public function scopeForCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope для сортировки
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Scope для общих FAQ (без привязки к категории)
     */
    public function scopeGeneral($query)
    {
        return $query->whereNull('category_id');
    }
    
    /**
     * Scope для FAQ конкретного товара
     */
    public function scopeForProduct($query, $productId)
    {
        // Попробуем разные способы поиска
        return $query->where(function($q) use ($productId) {
            $q->whereJsonContains('product_ids', $productId)
              ->orWhereJsonContains('product_ids', (string)$productId)
              ->orWhereRaw("JSON_CONTAINS(product_ids, ?)", [json_encode($productId)])
              ->orWhereRaw("JSON_CONTAINS(product_ids, ?)", [json_encode((string)$productId)]);
        });
    }
    
    /**
     * Получить товары, к которым привязан FAQ
     */
    public function products()
    {
        if (!$this->product_ids) {
            return collect();
        }
        
        return \App\Models\Product::whereIn('id', $this->product_ids)->get();
    }
    
    /**
     * Проверить, привязан ли FAQ к товару
     */
    public function isAttachedToProduct($productId)
    {
        return $this->product_ids && in_array($productId, $this->product_ids);
    }
}
