<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopSingleController extends Controller
{
    public function Show()
    {
        return view('shop-single');
    }
}
