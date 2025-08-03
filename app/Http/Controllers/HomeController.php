<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Show()
    {
//        return view('panel.index');
        $user = Auth::user();
        if ($user) {
            $role_auth = $user->getRoleNames()->first();
            if ($role_auth == 'seller') {
                abort(403, 'شما فروشنده اید ');
            }
        }
        $products = Product::limit(3)->with('properties')->where('status' , '10')->get();
        $categories = Category::all();
        return view('index' , compact('products', 'categories'));
    }
}
