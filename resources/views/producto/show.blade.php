@extends('layouts.app')

@section('template_title')
{{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: #8c8c8c90">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span id="card_title"><b>Producto</b></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto.index') }}"> Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card-body text-white mb-3">

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                @if(isset($producto->foto))
                                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}" alt="" width="650">
                                @endif
                            </div>
                        </div>
                        <div class="col-4" id="detallesP">
                            <div class="form-group">
                                <strong>Categoria:</strong>
                                {{ $producto->categoria }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo:</strong>
                                {{ $producto->tipo }}
                            </div>
                            <div class="form-group">
                                <strong>Genero:</strong>
                                {{ $producto->genero }}
                            </div>
                            <div class="form-group">
                                <strong>Precio:</strong>
                                {{ $producto->precio }}
                            </div>
                            <div class="form-group">
                                <strong>Marca:</strong>
                                {{ $producto->marca }}
                            </div>
                            <div class="form-group">
                                <strong>Color:</strong>
                                {{ $producto->color }}
                            </div>
                            <div class="form-group">
                                <strong>Talle:</strong>
                                {{ $producto->talle }}
                            </div>
                            <div class="form-group">
                                <strong>Stock:</strong>
                                {{ $producto->stock }}
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection