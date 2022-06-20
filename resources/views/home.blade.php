@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'admin')
<div class="container-fluid">
    <center>
        <h1><strong>¡¡ Bienvenido, {{Auth::user()->name}} !!</strong></h1>
    </center>
    <hr>
        <center><h2><strong>Lo Ultimo de Esta Semana</strong></h2></center>
        <center><img src="{{ asset('/img/Post.png') }}" alt="..."></center>
        <center><button class="btn btn-dark btn-lg catalogobtn" onclick="window.location.href='http://localhost/BoutiquePHP/public/producto'">Ir a Productos</button></center>
</div>
@else
<div class="container-fluid">
<center><h1><strong>¡¡ Bienvenido, {{Auth::user()->name}} !!</strong></h1></center>
<br>
<br>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="background: rgba(0,0,0,0)">
            <div class="carousel-item active">
                <img src="{{ asset('/img/item1.png') }}" class="carrucel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/img/item2.png') }}" class="carrucel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/img/item3.png') }}" class="carrucel" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: grey;"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: grey;"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <br>
    <div>
        <center><button class="btn btn-dark btn-lg catalogobtn" onclick="window.location.href='http://localhost/BoutiquePHP/public/catalogo'">Ir al Catalogo</button></center>
    </div>
</div>
@endif
@endsection