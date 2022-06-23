@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card" style="background: #8c8c8c90">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                        <img src="{{ asset('/img/cartA.png') }}" width="50px" alt="...">
                            <b> {{ __('Mi Carrito') }} </b>
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">

                <div class="cart">
                    <div class="contentedor">
                        @if(count(collect($items)) == "0")
                        <div class="no_items">
                            @if(count(collect($productos)) == "0")
                                <p><img src="{{ asset('/img/cartV.png') }}" width="150px" alt="..."></p>
                                <p>
                                    Hola, <strong>{{ Auth::user()->name }}</strong> tu carrito de compras esta Vacio!!
                                    <br>
                                    <button 
                                        class="btn btn-dark btn-lg carritobtn" onclick="window.location.href='http://localhost/BoutiquePHP/public/catalogo'">
                                        Agregar al 
                                        <img src="{{ asset('/img/cart.png') }}" width="30px" alt="...">
                                    </button>
                                </p>  
                            @else
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-secondary">
                                            <thead class="thead">
                                                <tr>
                                                    <th>#ID Usuario</th>
                                                    <th>#ID Orden</th>
                                                    <th>#ID Producto</th>
                                                    <th>Etiqueta</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Sub Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)
                                                    <tr>
                                                        <td>{{ $producto->user_id }}</td>
                                                        <td>{{ $producto->order_id }}</td>
                                                        <td>{{ $producto->product_id }}</td>
                                                        <td>{{ $producto->label_item }}</td>
                                                        <td>{{ $producto->quantity }}</td>
                                                        <td>{{ $producto->price }}</td>
                                                        <td>{{ $producto->total }}</td>

                                                        <td>
                                                            {{var_dump($producto->id)}}
                                                            <form action="{{ route('cart.destroy',$producto->id) }}" method="GET">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                        </div>
                        @else
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection