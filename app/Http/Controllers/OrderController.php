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

    public function FinalOrder(Request $request, $id)
    {
        $order = Order::where('buyer_id', Auth::id())->where('status', '0')->first();
        if (!$order) {
            return redirect()->back();
        }
        $order->update([
            'status' => '1',
            'cart_number' => $request->cart_number,
            'total_price' => $id,
            'code' => strtoupper(Str::random(10)),
        ]);
        return redirect()->route('Show-FinalOrder');
    }


    public function ShowFinalOrder()
    {
      $order =   Order::where('buyer_id', Auth::id())->where('status', '1')->latest('id')->first();
      $OrderProducts = $order->products()->get();
        return view('FinalOrder' , compact('OrderProducts' , 'order'));
    }


    // ALL  ORDERS FOR BUYER


    public function ShowAllOrder()
    {
      $orders =  Order::with('products')->where('buyer_id', Auth::id())->whereIn('status', ['1', '2'])->get();
        return view('allorders' , compact('orders'));
    }
}
