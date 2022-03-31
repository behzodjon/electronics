<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Storage;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class TestController extends Controller
{
    public function index()
    {
        $clientKey = request()->header('Client-Key');

        $userId = auth('sanctum')->id() ?? auth()->id();
        $sessionId = $clientKey ?? session()->getId();
        dd($sessionId);
    }
}
