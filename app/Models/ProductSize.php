<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
        'product_id',
        'size',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    /**
     * Связь с продуктом
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Получить отформатированную цену
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' руб';
    }
}
