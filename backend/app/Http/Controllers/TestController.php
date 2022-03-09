<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Storage;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function index()
    {
        $a = [1, 2, 3, 4, 5, 6, 7];
        $random_keys = Arr::random($a, 3);
        dd($random_keys);
    }
}
