@extends('plantilla')

@section('title','Registro')

@section('content')
    <main class="container align-center p-5">
        <h1>Registro a Expendio de Pan</h1>
        <br>
        <form action="{{route('validar-registro')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre</label>
                <input type="text" name="name" id="userInput" placeholder="¿Como quieres que te llamemos?, Introduce un nombre" class="form-control" required autocomplete="disable" pattern="[A-Za-z]{2,}" title="Solo se pueden colocar letras">
                <div class="valid-feedback">Nombre Valido</div>
                <div class="invalid-feedback">Nombre Invalido</div>
                <small style="color: red;">@error('name') {{ $message }} @enderror</small> 
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Correo</label>
                <input type="email" name="email" id="emailInput" placeholder="¿Cuál es tu correo electronico?, Introduce un correo valido" class="form-control" required autocomplete="disable" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                <div class="valid-feedback">Correo valido</div>
                <div class="invalid-feedback">Rectifica el correo electronico</div>
                <small style="color: red;">@error('email') {{ $message }} @enderror</small> 
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input type="password" name="password" id="passwordInput" placeholder="Introduce una contraseña segura" class="form-control" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,}$" title="La contraseña debe contener al menos una letra mayuscula, una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres" required autocomplete="disable">
                <div class="valid-feedback">Contraseña valida</div>
                <div class="invalid-feedback">Contraseña invalida</div>
                <small style="color: red;">@error('password') {{ $message }} @enderror</small> 
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
@endsection('content')