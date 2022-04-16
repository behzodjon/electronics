<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $product=Product::whereId(6)->with(['storages'])->first();
        $data=$product->storages->groupBy('id');
        dd($data[7]);
    }
}
