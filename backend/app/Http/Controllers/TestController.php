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
       $data= new Cart();
        dd($data);
    }
}
