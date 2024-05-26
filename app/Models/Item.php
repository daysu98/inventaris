<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'stock',
        'price',
        'description',
        'supplier_id',
        'user_id',
        'slug',
        'publish',
    ];

    /**
     * Get the supplier that owns the items.
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the user that owns the items.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
