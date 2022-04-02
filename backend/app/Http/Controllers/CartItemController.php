<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartItemsRequest;
use App\Http\Resources\CartItemResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    public function store(StoreCartItemsRequest $request)
    {
        $data = $request->validated();
        $sessionId = $data['sessionId'];
        $cart = Cart::whereSessionId($sessionId)->first();

        $cart->cartItems()->create([
            'category_id' => $data['category_id'],
            'product_id' => $data['product_id'],
            'storage_id' => $data['storage_id'],
            'condition_id' => $data['condition_id'],
            'price' => $data['price'],
        ]);

        return response()->noContent();
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return response()->noContent();
    }
}
