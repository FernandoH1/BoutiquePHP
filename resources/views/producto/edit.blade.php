@extends('layouts.app')

@section('template_title')
Crear Producto
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">Editar Producto</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto.index') }}"> Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('producto.update', $producto->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('producto.form',['modo'=>'Editar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection