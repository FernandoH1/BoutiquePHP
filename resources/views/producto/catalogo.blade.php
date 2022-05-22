@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Catalogo de productos') }}
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="submit" value="Buscar" class="btn btn-primary">
                                    </span>
                                </div>
                                <input type="text" name="buscar" class="form-control" placeholder="{{ __('Buscar...') }}" value="{{ $texto }}" required>
                            </div>
                            @if ($errors->has('buscar'))
                            <div id="buscar-error" class="error text-danger pl-3" for="buscar" style="display: block;">
                                <strong>{{ $errors->first('buscar') }}</strong>
                            </div>
                            @endif

                            <!-- Check box color -->
                            <!-- <div class="checkbox checkbox-success">
                                <input name="chk_color" id="chk_color" type="checkbox" value="chk_color">
                                <label for="chk_color" style="padding-left: 15px!important;">Color</label>
                            </div> -->


                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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

                        </div>
                        <!-- Barra de busqueda -->

                        <!-- Card con las imagenes -->
                        @if(count($productos)<=0) <div class="card my-5" style="width: 12rem;">
                            <img src="{{ asset('/img/boutique.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">No se encontro pordictos similares</h5>
                                <p class="card-text">Pruebe colocando otro Tipo de producto o con otra Marca</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                </div>
                @else
                @foreach ($productos as $producto)
                <div class="card" style="width: 12rem;">
                    <img src="{{asset('storage').'/'.$producto->foto}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$producto->tipo}} {{$producto->marca}}</h5>
                        <p class="card-text">Talle: {{$producto->talle}} </p>
                        <p class="card-text">Categoria: {{$producto->categoria}} </p>
                        <p class="card-text">Precio: ${{$producto->precio}} </p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
                @endforeach
                @endif

                <!-- {{$productos->links()}} -->
                <!-- Card con las imagenes -->
                </form>





            </div>
        </div>
        {!! $productos->links() !!}
    </div>
</div>
</div>
@endsection