<?php

namespace App\Models;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_prices')->withPivot('price');;
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class, 'products_prices')->withPivot('price');
    }

    /**
     * @return HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
