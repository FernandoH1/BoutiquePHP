<h1>{{$modo}} Producto</h1>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::text('tipo', $producto->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $producto->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $producto->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color') }}
            {{ Form::text('color', $producto->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talle') }}
            {{ Form::text('talle', $producto->talle, ['class' => 'form-control' . ($errors->has('talle') ? ' is-invalid' : ''), 'placeholder' => 'Talle']) }}
            {!! $errors->first('talle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label>Foto:</label>
            @if(isset($producto->foto))
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}" alt="" width="150">
            @endif
            <input type="file" class="form-control" name="foto" value="" id="foto">
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::text('categoria', $producto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
</br>
        <input type="submit" class="btn btn-primary" value="{{$modo}} datos">
    </div>
</div>