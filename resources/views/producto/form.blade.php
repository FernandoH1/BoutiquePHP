<h1>{{$modo}} Producto</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::text('tipo', $producto->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el tipo...']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $producto->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el genero...']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el precio...']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $producto->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la marca...']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color') }}
            {{ Form::text('color', $producto->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el color...']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talle') }}
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Indumentaria/Accesorios
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio2" >
                <label class="form-check-label" for="flexRadioDefault2">
                    Calzado
                </label>
            </div>  
           
            <script>
                window.onload = () => { 
                    document.getElementById('radio2').onclick = () => {
                        document.getElementById('talles').innerHTML = `
                        <div class='input-group mb-3' id='calzado'>
                            <label class='input-group-text' for='inputGroupSelect01'>Talle</label>
                            <select name='talle' class='form-select' id='inputGroupSelect01'>
                                <option selected>Elegir talle...</option>
                                <option value='30'>30</option>
                                <option value='31'>31</option>
                                <option value='32'>32</option>
                                <option value='33'>33</option>
                                <option value='34'>34</option>
                                <option value='35'>35</option>
                                <option value='36'>36</option>
                                <option value='37'>37</option>
                                <option value='38'>38</option>
                                <option value='39'>39</option>
                                <option value='40'>40</option>
                                <option value='41'>41</option>
                                <option value='42'>42</option>
                                <option value='43'>43</option>
                            </select>
                        </div>`;
                    }
                    
                    document.getElementById('radio1').onclick = () => {
                        document.getElementById('talles').innerHTML =`
                        <div class='input-group mb-3' id='indumentaria'>
                            <label class='input-group-text' for='inputGroupSelect01'>Talle</label>
                            <select name='talle' class='form-select' id='inputGroupSelect01'>
                                <option selected>Elegir talle...</option>
                                <option  value='XS'>XS</option>
                                <option value='S'>S</option>
                                <option value='M'>M</option>
                                <option value='L'>L</option>
                                <option value='XL'>XL</option>
                                <option value='XXL'>XXL</option>
                                <option value='XXXL'>XXXL</option>
                            </select>
                        </div>`;
                    }
            
                }
            </script>

            <div id="talles">
                {{ Form::text('talle', $producto->talle, ['class' => 'form-control' . ($errors->has('talle') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el talle...']) }}
            </div>

            <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::number('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el stock...']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            
        </div>
        <div class="form-group">
            <label>Foto:</label>
            @if(isset($producto->foto))
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}" alt="" width="150">
            @endif


            <input type="file" class="form-control" name="foto" value="{{$producto->foto}}" id="foto">
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::text('categoria', $producto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la categoria...']) }}
        </div>

    </div>
    <div class="box-footer mt20">
</br>
        <input type="submit" class="btn btn-primary" value="{{$modo}} datos">
    </div>
</div>