<?php

namespace App\Http\Controllers;

use App\Models\Finall;
use App\Models\FinalProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    public function ShowOrders()
    {
        $order = Order::where('buyer_id', Auth::id())->where('status', '0')->first();
        if (!$order) {
            return view('orders', ['products' => []]);
        }
        $products = $order->products()->withPivot('quantity', 'size', 'color')->get();
        return view('orders', compact('products'));

    }

    public function AddOrder(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('Show-Auth');
        }
        $product = Product::where('id', $id)->first();

        if ($request->quantity > $product->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'تعداد وارد شده بیشتر از موجودی انبار است.']);
        }

        $order = Order::where('buyer_id', Auth::id())->where('status', '0')->first();
        if (!$order) {
            Order::create([
                'buyer_id' => Auth::id(),
                'status' => '0',
            ]);
            $order = Order::where('buyer_id', Auth::id())->where('status', '0')->first();
        }
        $existing = $order->products()->wherePivot('product_id', $id)
            ->wherePivot('color', $request->color)
            ->wherePivot('size', $request->size)
            ->first();
        if ($existing) {
            $order->products()->updateExistingPivot($id, [
                'quantity' => $existing->pivot->quantity + 1]);
        } else {
            $order->products()->attach($id, [
                'quantity' => $request->quantity,
                'color' => $request->color,
                'size' => $request->size
            ]);
        }
        return redirect()->route('Show-Orders')->with('success', 'محصول به سبد خرید اضافه شد');
    }


    public function UpdateOrder(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::where('buyer_id', Auth::id())->first();
        if (!$order) {
            return redirect()->back()->withErrors(['msg' => 'سبد خریدی برای این کاربر پیدا نشد.']);
        }
        {
            DB::table('order_products')
                ->where('order_id', $order->id)
                ->where('product_id', $id)
                ->where('color', $request->color)
                ->where('size', $request->size)
                ->update([
                    'quantity' => $request->quantity,

                ]);

            return redirect()->route('Show-Orders')->with('success', 'تعداد محصول بروزرسانی شد.');
        }
    }

    public function DeleteOrder(Request $request)
    {
        $order = Order::where('buyer_id', Auth::id())->first();
        if (!$order) {
            return redirect()->back();
        }
        DB::table('order_products')
            ->where('order_id', $order->id)
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->delete();
        return redirect()->route('Show-Orders');
    }

    public function Final(Request $request, $id)
    {
        // مرحله 1: ایجاد سفارش نهایی
        $final = Finall::create([
            'user_id' => Auth::id(),
            'code' => Str::random(12),
            'total_price' => $id,
            'cart_number' => $request->cart_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // مرحله 2: گرفتن سفارش و محصولات سبد خرید کاربر
        $order = Order::where('buyer_id', Auth::id())->first();

        if (!$order) {
            // اگر سفارش قبلاً حذف شده (مثلاً کاربر رفرش کرد)، ری‌دایرکت کن به نمایش سفارش
            return redirect()->route('final.show', $final->id);
        }

        $order_products = DB::table('order_products')->where('order_id', $order->id)->get();

        // مرحله 3: انتقال محصولات به جدول فینال و کم کردن از موجودی
        foreach ($order_products as $order_product) {
            DB::table('final_product')->insert([
                'final_id' => $final->id,
                'product_id' => $order_product->product_id,
                'size' => $order_product->size,
                'color' => $order_product->color,
                'quantity' => $order_product->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $product = Product::find($order_product->product_id);
            if ($product && $product->quantity >= $order_product->quantity) {
                $product->quantity -= $order_product->quantity;
                $product->save();
            } else {
                Log::warning('موجودی کافی نیست برای محصول: ' . $order_product->product_id);
            }
        }

        // مرحله 4: حذف سفارش موقت (سبد خرید)
        DB::table('order_products')->where('order_id', $order->id)->delete();
        $order->delete();

        // مرحله 5: ری‌دایرکت به صفحه نهایی برای جلوگیری از اجرای مجدد همین کدها در رفرش
        return redirect()->route('final.show', $final->id);
    }


    public function show($id)
    {
        // گرفتن اطلاعات سفارش نهایی
        $final = DB::table('finals')->where('id', $id)->first();

        // اگه سفارش نهایی پیدا نشد، ارور بده یا برگرد به صفحه اصلی
        if (!$final) {
            abort(404, 'سفارش پیدا نشد');
        }

        // گرفتن محصولات مربوط به این سفارش با اطلاعات کامل از جدول products
        $final_products = DB::table('final_product')
            ->join('products', 'final_product.product_id', '=', 'products.id')
            ->where('final_product.final_id', $final->id)
            ->select(
                'final_product.*',
                'products.name as product_name',
                'products.image as product_image',
                'products.price as product_price'
            )
            ->get();


        return view('final', compact('final', 'final_products'));
    }


}
