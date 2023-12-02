@extends('plantilla')

@section('title','Expendio de pan')

@section('content')
<div class="container">
    <div id="productos" class="row">
        <div class="col-sm-12">
            <div class="row shadow p-3 mb-5 bg-white rounded">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <!-- Adjust image path accordingly -->
                    <img class="img-fluid" src="{{ asset('storage').'/'.$producto->imagen }}" alt="Product Image">
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <h4 class="text-dark">{{ $producto->nombre }}</h4>
                    <p>Tipo: {{ $producto->tipo }}</p>
                    <p>{{ $producto->descripcion }}</p>
                    <h5>$ {{ $producto->precio }}</h5>
                    <h6>{{ $producto->stock }} piezas disponibles</h6>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <center>
                <h4>Reseñas de este producto</h4>
            </center>
            @guest
            <center> Para poder escribir una reseña <a class="" href="{{ route('login') }}">Inicia sesion</a></center>
            @endguest
            @auth
            <div class="row">
                <form action="{{ route('calificar') }}" id="" method="POST" class="col-sm-12">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <center><b>Escribe una reseña</b></center>
                            <input type="hidden" name="producto" value="{{ $producto->id }}">
                            <div class="form-group">
                                <label for="titulo">Titulo:</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                                <small style="color: red;">@error('titulo') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Experiencia:</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
                                <small style="color: red;">@error('descripcion') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group">
                                <label for="calificacion">Calificación:</label>
                                <select id="calificacion" name="calificacion" class="form-control">
                                    <option value="1">1 estrella</option>
                                    <option value="2">2 estrellas</option>
                                    <option value="3">3 estrellas</option>
                                    <option value="4">4 estrellas</option>
                                    <option value="5">5 estrellas</option>
                                </select>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Comentar
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            @endauth
            <div class="col-sm-12">
                @if (count($comentarios) == 0)
                <h5>No se encontraron reseñas</h5>
                @else
                @foreach ($comentarios as $comentario)
                <div class="row shadow p-3 mb-5 bg-white rounded">
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <center><img class="img-fluid" style="max-height: 200px;" src="{{ asset('img/hombre.png') }}" alt="User Image"></center>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <h4 class="text-dark">{{ $comentario->titulo }}</h4>
                        <p>{{ $comentario->comentario }}</p>
                        <h6>Cliente: {{ $comentario->name }}</h6>
                        <h6>Calificación: {{ $comentario->estrellas }} estrellas</h6>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if (session('info'))
<script>
    M.toast({
        html: '{{ session("info")}} ',
        classes: 'black',
        displayLength: 3000,
    })
</script>
@endif
@endsection