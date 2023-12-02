@extends('plantilla')

@section('title','Inicio de Sesión - Expendio de pan')

@section('content')

<main class="container align-center p-5">
    <h1>Inicio de Sesión</h1>
    <br>
        <form action="{{route('inicia-sesion')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" name="email" id="emailInput" placeholder="Ingresa tu correo electrónico" value="{{ old('correo') }}" class="validate form-control" autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <div class="valid-feedback">Correo valido</div>
                <div class="invalid-feedback">Rectifica el correo electronico</div>
                <small style="color: red;">@error('email') {{ $message }} @enderror</small> 
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input type="password" placeholder="Introduce la contraseña" name="password" id="passwordInput" value="{{ old('contrasena') }}" class="validate form-control" required>
                <div class="valid-feedback">Contraseña valida</div>
                <div class="invalid-feedback">Rectifica la contraseña</div>
                <small style="color: red;">@error('password') {{ $message }} @enderror</small> 
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="rememberCheck" class="form-check-input">
                <label for="rememberCheck" class="form-check-label">Mantener sesión iniciada</label>
            </div>
            <div>
                <p>¿No tienes cuenta? <a href="{{route('registro')}}">Regístrarse</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Acceder</button>
        </form>
    </main>
@endsection('content')