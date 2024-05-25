<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    /**
     * Get the items for the supplier.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
