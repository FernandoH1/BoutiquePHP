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
                <div class="card-body">

                @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>{{ $message }}</p>
                </div>
                @endif

                    <div class="cart">
                        <div class="contentedor">
                            <div class="row">
                            @if($productos->isEmpty())
                                <div class="col-8">
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
                                </div> 
                            @else
                                <div class="col-8">
                                        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
                                            <div class="table-responsive">
                                                <table class="table table-secondary table-bordered">
                                                    <thead class="thead">
                                                        <tr>
                                                            <th>Foto</th>
                                                            <th>Etiqueta</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio Unitario</th>
                                                            <th>Sub Total</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sumaTotal = 0?>
                                                        @foreach ($productos as $producto)
                                                        <!-- {{ $sumaTotal += $producto->total}} -->
                                                            <tr>
                                                                <td>@if(isset($producto->foto))
                                                                    <center><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}" alt="" width="100" ></center>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $producto->label_item }}</td>
                                                                <td>{{ $producto->quantity }}</td>
                                                                <td>{{ $producto->price }}</td>
                                                                <td>{{ $producto->total }}</td>
                                                                <td>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='http://localhost/BoutiquePHP/public/cart/delete/{{$producto->id}}'"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                </div>
                                <div class="col-4" id="divOrden">
                                    <form method="POST" action="{{ route('cart.create') }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="total" value="{{ $sumaTotal }}">
                                        <div class="form-group">
                                            {{ Form::label('Dirección') }}
                                            <br>
                                            <input type="text" name="direccion"  id="direccion" class="form-control" placeholder="Ingrese la Dirección..."></input>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            {{ Form::label('Método de pago') }}
                                            <br>
                                            <div class='input-group mb-3' id='pago'>
                                                <select name='metodo' class='form-select' id='metodo'>
                                                    <option value='credito'>Crédito</option>
                                                    <option value='devito'>Débito</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <br>
                                        {{ Form::label('TOTAL :') }}
                                        <span>$ {{$sumaTotal}} </span>
                                        </div>
                                        @csrf
                                        <button type="submit" class="btn btn-success mt-3" onclick="window.location.href='http://localhost/BoutiquePHP/public/order/create'">Comprar</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection