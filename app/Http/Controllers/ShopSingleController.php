<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopSingleController extends Controller
{
    public function Show($id)
    {
        if (!$id)
        {
            abort(403 , 'محصول با خودتان نیاوردید');
        }
       $product =  Product::with('properties' , 'category' , 'user')->where('id', $id)->first();
        return view('shop-single' , compact('product'));
    }
}
