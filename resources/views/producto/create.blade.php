@extends('layouts.app')

@section('template_title')
Crear Producto
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">Crear Producto</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto.index') }}"> Volver</a>
                        </div>
                    </div>
                </div>
                    <div class="card-body" style="background-color: #E2E3E5;">
                        <form method="POST" action="{{ route('producto.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form',['modo'=>'Registrar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection