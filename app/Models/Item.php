<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'type', // 'lost' or 'found'
        'location',
        'date_reported',
        'image_path',
        'status', // 'open', 'claimed', 'resolved'
    ];

    protected $casts = [
        'date_reported' => 'datetime',
    ];

    /**
     * Get the user who reported this item
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the claims for this item
     */
    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    /**
     * Scope to get only lost items
     */
    public function scopeLost($query)
    {
        return $query->where('type', 'lost');
    }

    /**
     * Scope to get only found items
     */
    public function scopeFound($query)
    {
        return $query->where('type', 'found');
    }

    /**
     * Scope to get only active items
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'open');
    }
}
