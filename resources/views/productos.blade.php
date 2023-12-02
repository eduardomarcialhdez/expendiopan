@extends('plantilla')

@section('title','Productos - Expendio de Pan')

@section('content')
<nav class="navbar">
    <div class="container">
        <form class="d-flex" role="search">
            <input class="form-control me-2" name="buscar-por" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif
</nav>
<div class="container">
    <h1>Nuestros Panes</h1>
</div>
<br>
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @if(count($productos) == 0)
            <h2>No hay productos</h2>
        @else
            @foreach($productos as $producto)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset('storage').'/'.$producto->imagen}}">
                    <div class="card-body">
                        <a href="{{ route('producto.mostrar', $producto->nombre) }}"><h4 class="card-title">Pan: {{$producto->nombre}}</h4></a>
                        <p class="card-text">Descripción: {{$producto->descripcion}}</p>
                        <h5 class="card-title">Tipo: {{$producto->tipo}}</h5>
                        <p class="card-text">Stock: {{$producto->stock}}</p>
                        <h3 class="card-text">Precio: {{$producto->precio}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection