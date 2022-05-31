@extends('layouts.app')

@section('content')
<div class="container-fluid">
<center><h1><strong>Bienvenidos!!</strong></h1></center>
<br>
<br>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="background: #EBEBEB90">
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
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <br>
    <div>
        <center><button class="btn btn-dark btn-lg catalogobtn" onclick="window.location.href='http://localhost/BoutiquePHP/public/catalogo'">Ir al Catalogo</button></center>
    </div>
</div>
@endsection