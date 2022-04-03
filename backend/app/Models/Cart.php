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
     * @return Cart|Model
     */
    public static function createCart()
    {
        return self::create([
            'user_id'    => null,
            'session_id' => session()->getId(),
        ]);
    }
}
