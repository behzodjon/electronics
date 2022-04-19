<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $user=User::whereId(1)->first();
        dd($user->isAdmin());
        
    }
}
