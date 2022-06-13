@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
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
                                <input type="text" name="buscar" class="form-control" placeholder="{{ __('Buscar...') }}" required>
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
                                <!-- Combobox Talles de la DB -->
                                <script>
                                    function  crearUrl(tipo, valor){
                                        let talle = document.getElementById("valorTalle").value;
                                        let color = document.getElementById("valorColor").value;
                                        let marca = document.getElementById("valorMarca").value;
                                        let orden = document.getElementById("valorMarca").value;

                                        if(tipo == "talle"){
                                            talle = valor;
                                        }
                                        if(tipo == "color"){
                                            color = valor;
                                        }
                                        if(tipo == "marca"){
                                            marca = valor;
                                        }
                                        if(tipo == "orden"){
                                            orden = valor;
                                        }

                                        window.location.href = "/php/BoutiquePHP/public/catalogo/"+talle+"/"+color+"/"+marca+"/"+orden;
                                    } 
                                </script>
                                <!-- javascript:funcion(); -->

                                <input id="valorTalle" name="valorTalle" type="hidden" value="{{$valueTalle}}" />
                                <input id="valorColor" name="valorColor" type="hidden" value="{{$valueColor}}"/>
                                <input id="valorMarca" name="valorMarca" type="hidden" value="{{$valueMarca}}"/>
                                <input id="valorOrden" name="valorOrden" type="hidden" value="{{$valueOrden}}"/>

                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Talles
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($filtroTalle as $producto)
                                            <li>
                                                <a class="dropdown-item" href="javascript:crearUrl('talle','{{$producto->talle}}');">
                                                    {{$producto->talle}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- ------------------------ -->

                                <!-- Combobox Colores de la DB -->
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Color
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($filtroColor as $producto)
                                            <li>
                                                <a class="dropdown-item" href="javascript:crearUrl('color','{{$producto->color}}');">
                                                    {{$producto->color}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- ------------------------- -->

                                <!-- Combobox Marcas de la DB -->
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Marca
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($filtroMarca as $producto)
                                            <li>
                                                <a class="dropdown-item" href="javascript:crearUrl('marca','{{$producto->marca}}');">
                                                    {{$producto->marca}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- ------------------------ -->

                                <!-- Combobox Ordenar productos -->
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle m-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f3af6e;">
                                        Precio
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="javascript:crearUrl('orden','menor');">Menor Precio</a></li>
                                        <li><a class="dropdown-item" href="javascript:crearUrl('orden','mayor');">Mayor Precio</a></li>
                                    </ul>
                                </div>
                                <!-- -------------------------- -->
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
                                    </div>
                                @endforeach
                            </div>
                        @endif
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection