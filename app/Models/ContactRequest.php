<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope для новых заявок
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope для заявок в работе
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    /**
     * Scope для завершенных заявок
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
