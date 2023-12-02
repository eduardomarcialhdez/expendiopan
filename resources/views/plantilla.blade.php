<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/cc064abe75.js" crossorigin="anonymous"></script>
  @laravelPWA
</head>

<body>
  <div class="container-fluid" style="background-color: #b9cdc4;">
    <header class="navbar navbar-expand-md d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom navbar-light">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a href="{{route('home')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        
        <span class="fs-4 center">Expendio de Pan</span>
      </a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav nav-pills ms-auto"> 
          <li class="nav-item"><a href="{{route('home')}}" class="nav-link"><i class="fas fa-home"></i> Inicio</a></li>
          <li class="nav-item"><a href="{{route('productos')}}" class="nav-link"><i class="fas fa-book"></i> Nuestro Catálogo</a></li>
          <!---<li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-blog"></i> Blo</a></li>--->
          <li class="nav-item"><a href="{{route('nosotros')}}" class="nav-link"><i class="fas fa-users"></i> Nosotros</a></li>
          @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-regular fa-user"></i>
                {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('profile')}}">Mi Perfil</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-to-bracket"></i> Cerrar Sesión</a></li>
                </ul>
            </li>
            @endauth
            @guest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-sign-in-alt"></i> Sesión
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{url('/login/')}}"><i class="fa-regular fa-id-card"></i> Inicio Sesión</a></li>
                    <li><a class="dropdown-item" href="{{url('/registro/')}}"><i class="fa-regular fa-pen-to-square"></i> Registro</a></li>
                </ul>
            </li>
            @endguest
        </ul>
      </div>
    </header>
  </div>
  
  <!---Contenido Inicio--->
  <div class="container-fluid">
    @yield('content')
  </div>
  <!---Contenido Fin--->

    <footer class="container-fluid col-sm col-md row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top" style="background-color: #ac8255;">
      <div class="col mb-3">
        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <p class="text-body-secondary">© Expendio de Pan 2023</p>
      </div>

      <div class="col mb-3">

      </div>

      <div class="col mb-3">
        <h5>Expendio de Pan</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-body-secondary">Inicio</a></li>
          <li class="nav-item mb-2"><a href="{{route('productos')}}" class="nav-link p-0 text-body-secondary">Nuestro Catálogo</a></li>
          <li class="nav-item mb-2"><a href="{{route('nosotros')}}" class="nav-link p-0 text-body-secondary">Nosotros</a></li>
        </ul>
      </div>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>