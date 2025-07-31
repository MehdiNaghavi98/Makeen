<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function AddComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        if (!$id) {
            return redirect()->back();
        }

        $CountComment = Comment::where('product_id', $id)->where('user_id', Auth::id())->count();
        if ($CountComment > 2) {
            return redirect()->back()->with('limited', 'شما فقط اجازه ثبت دو نظر برای این محصول را دارید.');
        }


        Comment::create([
            'comment' => $request->comment,
            'product_id' => $id,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
            'rating' => $request->rating
        ]);
        return redirect()->back()->with('success', Auth::user()->name . ' عزیز نظرت با موفقیت ثبت شد');
    }
}
