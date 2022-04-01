<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show($sessionId)
    {
        $cart = Cart::whereSessionId($sessionId)->with('cartItems')->first();

        return new CartResource($cart);
    }

    public function store(Request $request)
    {
        $data = Cart::createCart();

        return response()->json($data);
    }
}
