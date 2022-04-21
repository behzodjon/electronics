<?php

namespace App\Models;

use App\Models\Storage;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'image',
    ];
    
    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class, 'products_prices')->withPivot('price', 'condition_id');
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'products_prices');
    }

    /**
     * @return HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
