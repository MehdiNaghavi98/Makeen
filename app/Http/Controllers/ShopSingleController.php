<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
       $product =  Product::with('properties' , 'category' , 'user' , 'comments')->where('id', $id)->first();
       $avg =  Comment::where('product_id', $id)->get()->avg('rating');
        return view('shop-single' , compact('product' , 'avg'));
    }
}
