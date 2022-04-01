<?php

namespace App\Models;

use App\Services\Builders\CartBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'session_id',
    ];

      /**
     * @return HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
      /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return CartBuilder|Builder|Model
     */
    public function newEloquentBuilder($query)
    {
        return new CartBuilder($query);
    }

      /**
     * @return Cart|Model
     */
    public static function createCart()
    {
        $clientKey = request()->header('Client-Key');

        return self::create([
            'user_id'    => auth('sanctum')->id() ?? auth()->id(),
            'session_id' => $clientKey ?? session()->getId(),
        ]);
    }

}
