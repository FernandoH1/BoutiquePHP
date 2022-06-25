<?php

namespace App\Http\Controllers;

use App\Http\Models\Order;
use App\Models\OrderItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $productos = OrderItem::paginate();

        // $order_id = $this->getUserOrder()->id;
        // return count(collect($order->getItems));
        $data = ['order' => $order, 'items' => $items];
        return view('carrito.cart', $data)
            ->with(compact('productos'))->with('i', (request()->input('page', 1) - 1) * $productos->perPage());;
    }

    public function destroy($id)
    {
        $producto = OrderItem::find($id)->delete();
        return redirect()->route('cart')
            ->with('success', 'Order Item se elimino');
    }


    public function show($id)
    {
        $producto = Producto::find($id);

        return view('carrito.showProducto', compact('producto'));
    }

    public function getUserOrder()
    {
        $order = Order::where('status', '0')->count();
        if ($order == 0) :
            $order = new Order();
            // $order->status = 0;
            $order->user_id = Auth::user()->id;
            $order->save();
        else :
            $order = Order::where('status', '0')->first();
        endif;
        return $order;
    }

    public function postCartAdd(Request $request)
    {
        // $order = $this->getUserOrder();
        $user_id = $request->get('idUser');
        $quantity = $request->get('quantity');
        $product = $request->get('idProduct');
        $name = $request->get('ProductName');
        $datos = request()->except('_token');
        $datos['total'] = $request->quantity * $request->price;
        // print_r($datos);
        
        $productoSeleccionado = Producto::find($product);
        $totalRestante = $productoSeleccionado->stock - $quantity;

        if ($request->input('quantity') < 1) {
            return back()->with('message', 'Cantidad no ingresadad.')->with('typealert', 'danger');
        } else {
            $oitem = new OrderItem();
            $oitem->user_id = $user_id;
            $oitem->order_id = null;
            $oitem->product_id = $product;
            $oitem->label_item = $name;
            $oitem->quantity = $quantity;
            $oitem->price = $request->price;
            $oitem->total = $datos['total'] = $request->quantity * $request->price;
            
            DB::update('update productos set stock = ? where id = ?', [$totalRestante, $oitem->product_id]);
            
            if ($oitem->save()) {
                return back()->with('message', 'Order Item Agregado.')->with('typealert', 'success');
            }
        }
    }
}
