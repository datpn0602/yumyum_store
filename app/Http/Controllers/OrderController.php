<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderFood;

class OrderController extends Controller
{
    public function index()
    {
         $orders = Order::all();
         return view('orders.index', compact('orders'));
    }

    public function getDetail($id)
    {   
        $total = 0;
        $order = Order::findOrFail($id);
        $order_id = $id;
    	$order_detail = OrderFood::where('order_id', $id)->get();
        foreach($order_detail as $detail) {
            if(isset($detail->food->promotion->discount)) {
                $total += $detail->quantity*$detail->price*(100-$detail->food->promotion->discount)/100;
            } else {
                $total += $detail->quantity*$detail->price;
            }
        }

    	return view('orders.detail', compact('order_detail', 'order', 'total', 'order_id'));
    }

    public function getHandle($id)
    {
        return view('orders.detail');
    }

    public function postHandle(Request $request, $id)
    {
        $status = Order::where('id', $id)->select('status')->update([
            'status' => $request->status,
        ]);
        return redirect()->route('order.index')->with('status', 'Profile updated successful');
    }
}
