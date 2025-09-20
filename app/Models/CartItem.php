<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'size',
        'price',
        'quantity'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    /**
     * Связь с продуктом
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Связь с пользователем
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить отформатированную цену
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' руб';
    }

    /**
     * Получить общую стоимость позиции
     */
    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Получить отформатированную общую стоимость
     */
    public function getFormattedTotalAttribute()
    {
        return number_format($this->total, 2, ',', ' ') . ' руб';
    }

    /**
     * Scope для получения товаров по сессии
     */
    public function scopeForSession($query, $sessionId)
    {
        return $query->where('session_id', $sessionId);
    }

    /**
     * Scope для получения товаров пользователя
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope для получения товаров текущего пользователя или сессии
     */
    public function scopeForCurrent($query, $sessionId = null, $userId = null)
    {
        if ($userId) {
            return $query->where('user_id', $userId);
        }
        
        return $query->where('session_id', $sessionId);
    }

    /**
     * Глобальный scope для фильтрации по пользователю или сессии
     */
    protected static function booted()
    {
        static::addGlobalScope('user_or_session', function (\Illuminate\Database\Eloquent\Builder $builder) {
            if (Auth::check()) {
                $builder->where('user_id', Auth::id());
            } else {
                $builder->where('session_id', session()->getId());
            }
        });
    }
}
