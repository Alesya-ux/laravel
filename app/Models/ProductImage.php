<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'sort_order',
        'is_main'
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Связь с продуктом
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Получить полный URL изображения
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Scope для получения главного изображения
     */
    public function scopeMain($query)
    {
        return $query->where('is_main', true);
    }

    /**
     * Scope для сортировки по порядку
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Scope для получения дополнительных изображений
     */
    public function scopeAdditional($query)
    {
        return $query->where('is_main', false);
    }
}
