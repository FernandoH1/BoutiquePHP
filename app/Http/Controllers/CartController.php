<?php

namespace App\Http\Controllers;

use App\Http\Models\Order;
use App\Models\OrderItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class CartController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
    }

    public function getCart()
    {
        $order = $this->getUserOrder();
        $items = $order->getItems;
        $productos = DB::table('orders_items')->select('*')
        ->whereNull('order_id')->paginate();
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
    public function crearOrden(Request $request)
    {
        $user_id = $request->get('user_id');
        $total = $request->get('total');
        $direccion = $request->get('direccion');
        $metodo = $request->get('metodo');
        // $orderItems = OrderItem::paginate();
        $orderItems = DB::table('orders_items')->select('*')
             ->whereNull('order_id')->count();
    
        $orden= new Order();
        $orden->user_id = $user_id;
        $orden->user_address = $direccion;
        $orden->payment_method = $metodo;
        $orden->total = $total;
        $orden->status = 100;
        $orden->paid_at = new DateTime();
     
        if ($orden->save()) {
            for ($i=0;$i<$orderItems;$i++) { 
                DB::update('update orders_items set order_id = ? where user_id = ? and order_id is null', [$orden->id, $user_id]);
            }
            return back()->with('message', 'Order Realizada con Exito!!.')->with('typealert', 'success');
        } 
    }
}
