@extends('plantilla')

@section('title','Perfil de Usuario')

@section('content')

<main class="container align-center p-5">
    <h1>Perfil de {{Auth::user()->name}}</h1>
    <br>
</main>
@endsection('content')