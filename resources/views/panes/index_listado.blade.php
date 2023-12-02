<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Vehículos - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
@include('components.header')
<body>
<div class="container">
        {{ Breadcrumbs::render('crud-inicio') }}
    </div>
    <div class="container">
        @if(Session::has('mensaje'))
        {{Session::get('mensaje')}}
        @endif
        <br>
        <a href="{{url('crud-autos/create')}}" class="btn btn-primary">Registrar un nuevo vehículo</a>
        <br><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Tipo Vehiculo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coches as $coche)
                <tr>
                    <td>{{$coche->id}}</td>
                    <td>
                        <img src="{{asset('storage').'/'.$coche->Imagen}}" width="100">
                    </td>
                    <td>{{$coche->Marca}}</td>
                    <td>{{$coche->Modelo}}</td>
                    <td>{{$coche->Anio}}</td>
                    <td>{{$coche->Precio}}</td>
                    <td>{{$coche->Vehiculo}}</td>
                    <td>
                        <a href="{{url('/crud-autos/'.$coche->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a> |

                        <form action="{{url('/crud-autos/'.$coche->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form>

                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
@include('components.footer')
</html>