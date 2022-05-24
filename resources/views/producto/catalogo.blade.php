@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')
<style>
    .cards{
        border-radius: 10px;
    }
    .card-img-top{
        border-radius: 30px;
    }
    .cards:hover {
        transition: all 400ms ease;
        box-shadow: 10px 10px 5px 6px rgba(0, 0, 0, 30%);
        transform: scale(1.05);
    }
</style>

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
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </div>
                            @if ($errors->has('buscar'))
                            <div id="buscar-error" class="error text-danger pl-3" for="buscar" style="display: block;">
                                <strong>{{ $errors->first('buscar') }}</strong>
                            </div>
                            @endif
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <button class="btn btn-secondary dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Color
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
                                    <button class="btn btn-secondary dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Marca
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
                                    <button class="btn btn-secondary dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Precio
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
                            </div>
                        </div>
                        <!-- Barra de busqueda -->

                        <!-- Card con las imagenes -->
                        @if(count($productos)<=0) <div class="card my-5" style="width: 20rem; margin:auto">
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
                        <div class="cards text-black mb-3" style="width: 19rem; margin:auto; margin-top: 20px; background: white;">
                            <img src="{{asset('storage').'/'.$producto->foto}}" class="card-img-top" alt="..." height="250px" style="padding: 20px">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto->tipo}} {{$producto->marca}}</h5>
                                <p class="card-text">Talle: {{$producto->talle}} </p>
                                <p class="card-text">Categoria: {{$producto->categoria}} </p>
                                <p class="card-text">Precio: ${{$producto->precio}} </p>
                            </div>
                        </div>
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