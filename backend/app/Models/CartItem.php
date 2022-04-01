<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;


    /**
     * @var array
     */
    protected $fillable = [
        'cart_id',
        'category_id',
        'product_id',
        'storage_id',
        'condition_id',
        'price',
    ];

    /**
     * @return BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

     /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

     /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     /**
     * @return BelongsTo
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

     /**
     * @return BelongsTo
     */
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}
