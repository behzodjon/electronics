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
        $oldCart = Cart::whereSessionId("IC8HZ7JHT3LU4fM1CzB1FboBnzZ53hH7Y59MJl9E")->first()->user_id ?? null;

        dd( auth()->id());
    }
}
