<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function ShowPaymentMellat($id)
    {

        if (!$id)
        {
            abort(403 , 'not found');
        }
        return view('payment-mellat', compact('id'));
    }

    public function ShowPaymentSedad($id)
    {
        if (!$id)
        {
            abort(403 , 'not found');
        }
        return view('payment-sedad' , compact('id'));
    }
}
