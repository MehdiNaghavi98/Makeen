<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{


    public function ShowPanel()
    {
        if (auth()->check() && auth()->user()->hasRole('seller')) {
            $user = Auth::user();
            $products = Product::with(['properties', 'category'])->where('seller_id', Auth::id())->get();
            return view('panel.index', compact('user', 'products'));
        }

        return redirect()->route('Show-Auth');


    }

    public function ShowCreate()
    {
        $categories = Category::all();
        return view('panel.create', compact('categories'));
    }

    public function CreateProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'gender' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'brand' => 'required',
        ]);


        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'gender' => $request->gender,
            'category_id' => $request->category,
            'brand' => $request->brand,
            'seller_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $product->update([
                'image' => $imageName,
            ]);
        }

        $colors = array_values(array_filter($request->input('colors', [])));
        foreach ($colors as $color) {
            DB::table('property_product')->insert([
                'product_id' => $product->id,
                'property_id' => 1,
                'content' => $color,
            ]);
        }
        $sizes = array_values(array_filter($request->input('sizes', [])));
        foreach ($sizes as $size) {
            DB::table('property_product')->insert([
                'product_id' => $product->id,
                'property_id' => 2,
                'content' => $size,
            ]);
        }

        return redirect()->route('Show-Panel')->with('success', 'محصول با موفقیت اضافه شد');
    }


    public function ShowCategories()
    {
        $categories = Category::all();
        return view('panel.c_categories', compact('categories'));
    }

    public function CreateCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255|string',
        ]);

        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('Show-Panel');
    }

    public function DeleteAllProduct()
    {
       $products =  Product::where('seller_id', Auth::id())->get();
       foreach ($products as $product) {
           if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
               unlink(public_path('uploads/products/' . $product->image));
           }
           $product->delete();
       }
        return redirect()->route('Show-Panel');
    }


    public function delete($id)
    {
        if ($id) {
            $product = Product::findOrFail($id);
            $imagePath = public_path('uploads/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $product->delete();
            return redirect()->route('Show-Panel');
        }
        return redirect()->route('Show-Panel');
    }

    public function ChangeStatus($id)
    {
        if ($id) {
            $product = Product::find($id);

            if ($product->status == 10) {
                $product->update(['status' => '0']);
            } else {
                $product->update(['status' => '10']);
            }
            return redirect()->route('Show-Panel');
        }
        return redirect()->route('Show-Panel');
    }

    public function ShowUpdate($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('panel.update', compact('product', 'categories'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'brand' => 'required',
            'category' => 'required',
        ]);
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'gender' => $request->gender,
            'brand' => $request->brand,
            'category_id' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            // مسیر عکس قبلی
            $oldImagePath = public_path('uploads/products/' . $product->image);

            // حذف عکس قبلی اگر وجود داشته باشد
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // آپلود عکس جدید
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);

            // آپدیت فیلد عکس محصول
            $product->update(['image' => $imageName]);
        }


        // حذف رنگ و سایزهای قبلی همیشه انجام میشه
        DB::table('property_product')->where('product_id', $product->id)->delete();

        // ذخیره رنگ‌ها
        $colors = array_filter($request->input('colors', []));
        foreach ($colors as $color) {
            DB::table('property_product')->insert([
                'product_id' => $product->id,
                'property_id' => 1, // id ویژگی رنگ
                'content' => $color,
            ]);
        }

        // ذخیره سایزها
        $sizes = array_filter($request->input('sizes', []));
        foreach ($sizes as $size) {
            DB::table('property_product')->insert([
                'product_id' => $product->id,
                'property_id' => 2, // id ویژگی سایز
                'content' => $size,
            ]);
        }

        return redirect()->route('Show-Panel');
    }
}
