@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <center>
        <h1><strong>¡¡ Bienvenido, {{Auth::user()->name}} !!</strong></h1>
    </center>
    <hr>
    
        <center><h2><strong>Lo Ultimo de Esta Semana</strong></h2></center>
        <center><img src="{{ asset('/img/Post.png') }}" alt="..."></center>
        <center><button class="btn btn-dark btn-lg catalogobtn" onclick="window.location.href='http://localhost/BoutiquePHP/public/producto'">Ir a Productos</button></center>
</div>
@endsection