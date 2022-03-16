<?php

namespace App\Http\Controllers;

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
        $category = Category::whereId(1)->first();
        $products=$category->products()->with('category')->get();
        dd($products);
    }
}
