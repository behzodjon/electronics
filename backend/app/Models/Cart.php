<?php

namespace App\Models;

use App\Services\Builders\CartBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];

   
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public static function createCart()
    {
        return self::create([
            'user_id'    => null,
            'session_id' => session()->getId(),
        ]);
    }
}
