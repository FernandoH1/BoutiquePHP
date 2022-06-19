<?php

namespace App\Http\Controllers;
use App\Http\Models\Order , App\Http\Models\OrderItem;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    // public function index()
    // {
    //     return view('carrito.cart');
    // }

    public function __Construct()
    {
        $this->middleware('auth');   
    }

    public function getCart()
    {
        $order = $this->getUserOrder();
        $items = $order->getItems;
       // $order_id = $this->getUserOrder()->id;
       // return count(collect($order->getItems));
        $data = ['order' => $order, 'items' => $items];
        return view('carrito.cart', $data);
    }

    public function getUserOrder(){
        $order = Order::where('status', '0')->count();
        if($order == 0):    
            $order = new Order();
            // $order->status = 0;
            $order->user_id = Auth::user()->id;
            $order->save();
        else:
            $order = Order::where('status', '0')->first();
        endif;
        return $order;
    }


}
