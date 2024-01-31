<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        Order::create([
            'product' => $request->product,
            'total_price' => $request->price,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('order')->withSuccess('Your product is on process');
    }
    public function index()
    {
        $userOrders = Order::where('user_id', Auth::user()->id)->orderBy("id", "DESC")->get();

        return view('order.index', [
            'orders' => $userOrders,
        ]);
    }
}
