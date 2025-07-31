<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function Show($cat = null)
    {
        if ($cat == 'male' || $cat == 'female') {
            $products = Product::with('properties')->where('gender', $cat)->where('status' , '10')->get();
            $categories = Category::all();
            return view('shop', compact('products', 'categories'));
        } else {
            if ($cat) {
                $products = Product::with('properties')->where('status' , '10')->where('category_id', $cat)->get();
                $categories = Category::all();
                return view('shop', compact('products', 'categories'));
            } else {
                $products = Product::with('properties')->where('status' , '10')->get();
                $categories = Category::all();
                return view('shop', compact('products', 'categories'));
            }
        }

    }
}
