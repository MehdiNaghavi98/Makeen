<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function Show($cat = null)
    {
        $categories = Category::all();

        if ($cat == 'down') {
            $products = Product::with('properties')->where('status', '10')
                ->orderBy('price', 'DESC')->paginate(12);
            return view('shop', compact('products', 'categories'));
        }
        if ($cat == 'up') {
            $products = Product::with('properties')->where('status', '10')
                ->orderBy('price', 'ASC')->paginate(12);
            return view('shop', compact('products', 'categories'));
        }

        if ($cat == 'male' || $cat == 'female') {
            $products = Product::with('properties')->where('gender', $cat)->where('status', '10')->get();
            return view('shop', compact('products', 'categories'));
        } else {
            if ($cat) {
                $products = Product::with('properties')->where('status', '10')->where('category_id', $cat)->get();
                return view('shop', compact('products', 'categories'));
            } else {
                $products = Product::with('properties')->where('status', '10')->get();
                return view('shop', compact('products', 'categories'));
            }
        }
    }
}
