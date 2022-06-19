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