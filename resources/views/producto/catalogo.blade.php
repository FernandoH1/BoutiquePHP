@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="background: #EBEBEB90">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <b> {{ __('Catalogo de productos') }} </b>
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
                    <form action="{{route('producto.catalogo')}}" method="get">
                        <!-- Barra de busqueda -->
                        <div class="bmd-form-group{{ $errors->has('buscar') ? ' has-danger' : '' }} my-3">

                            <div class="input-group mb-3">
                                <input type="text" name="buscar" class="form-control" placeholder="{{ __('Buscar...') }}" value="{{ $texto }}" required>
                                <div class="input-group-append">
                                    <button class="btns btn text-black" type="submit">Buscar</button>
                                </div>
                            </div>
                            @if ($errors->has('buscar'))
                            <div id="buscar-error" class="error text-danger pl-3" for="buscar" style="display: block;">
                                <strong>{{ $errors->first('buscar') }}</strong>
                            </div>
                            @endif
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Talles
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('producto.xs')}}">XS</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.s')}}">S</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.m')}}">M</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.l')}}">L</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.xl')}}">XL</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.xxl')}}">XXL</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.xxxl')}}">XXXL</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Color
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li style="padding:3px"><a class="ui" href="{{route('producto.negro')}}"></a><div style="display:block">Negro</div></li>
                                        <li style="padding:3px"><a class="ui uiblue" href="{{route('producto.azul')}}"></a><div style="display:block">Azúl</div></li>
                                        <li style="padding:3px"><a class="ui uibrown" href="{{route('producto.marron')}}"></a><div style="display:block">Marrón</div></li>
                                        <li style="padding:3px"><a class="ui uigreen" href="{{route('producto.verde')}}"></a><div style="display:block">Verde</div></li>
                                        <li style="padding:3px"><a class="ui uired" href="{{route('producto.rojo')}}"></a><div style="display:block">Rojo</div></li> 
                                        <li style="padding:3px"><a class="ui uiyellow" href="{{route('producto.amarillo')}}"></a><div style="display:block">Amarillo</div></li>
                                        <li style="padding:3px"><a class="ui uiwhite" href="{{route('producto.blanco')}}"></a><div style="display:block">Blanco</div></li>
                                        
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Marca
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('producto.nike')}}">Nike</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.adidas')}}">Adidas</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.marcel')}}">Marcel</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Precio
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('producto.preciom')}}">Menor Precio</a></li>
                                        <li><a class="dropdown-item" href="{{route('producto.precioM')}}">Mayor Precio</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Barra de busqueda -->

                        <!-- Card con las imagenes -->
                        @if(count($productos)<=0) 
                        <div class="cards my-5" style="width: 20rem; margin:auto">
                            <img src="{{ asset('/img/boutique.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">No se encontro pordictos similares</h5>
                                <p class="card-text">Pruebe colocando otro Tipo de producto o con otra Marca</p>
                                <a href="{{route('producto.catalogo')}}" class="btn btn-primary">Volver al Incio</a>
                            </div>
                </div>
                @else
                <div class="row" style="margin: auto">
                    @foreach ($productos as $producto)
                    <div class="col-3">
                    <!-- <a href="{{route('producto.xl')}}"> -->
                        <div class="cards text-black mb-3" style="width: 19rem; margin:auto; margin-top: 20px; background: white;">
                            <img src="{{asset('storage').'/'.$producto->foto}}" class="card-img-top" alt="..." height="250px" style="padding: 20px">
                            <div class="card-body">
                            <fieldset class="border p-2" style="background-color: #f2f2f2; border-radius: 10px">
                                <h5 class="card-title">{{$producto->tipo}} {{$producto->marca}}</h5>
                                <p class="card-text">Talle: {{$producto->talle}} </p>
                                <p class="card-text">Categoria: {{$producto->categoria}} </p>
                                <p class="card-text">Precio: ${{$producto->precio}} </p> 
                            </fieldset>
                            </div> 
                        </div>
                        <!-- </a> -->
                    </div>
                    @endforeach
                </div>
                @endif
                </form>
            </div>
        </div>
        {!! $productos->links() !!}
    </div>
</div>
</div>
@endsection