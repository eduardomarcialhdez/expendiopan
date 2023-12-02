<h1>{{$modo}} Vehículo</h1>
<br><label for="Marca">Marca</label>
<input type="text" value="{{isset($auto->Marca)?$auto->Marca:''}}" name="Marca" id="Marca" pattern="^[a-zA-Z0-9]+$" required>
<br><label for="Modelo">Modelo</label>
<input type="text" value="{{isset($auto->Modelo)?$auto->Modelo:''}}" name="Modelo" id="Modelo" required>
<br><label for="Anio">Año</label>
<input type="text" value="{{isset($auto->Anio)?$auto->Anio:''}}" name="Anio" id="Anio" pattern="^[1-9][0-9]{3}$" required>
<br><label for="Precio">Precio</label>
<input type="text" value="{{isset($auto->Precio)?$auto->Precio:''}}" name="Precio" id="Precio" pattern="^[0-9]+([.,][0-9]+)?$" required>
<br><label for="Imagen">Imagen</label>
@if(isset($auto->Imagen))
<img src="{{asset('storage').'/'.$auto->Imagen}}" width="100">
@endif
<input type="file" name="Imagen" value="" id="Imagen" accept=".jpg, .jpeg, .png">
<br><label for="Vehiculo">Vehículo</label>
<select name="Vehiculo" id="Vehiculo" value="{{isset($auto->Vehiculo)?$auto->Vehiculo:''}}">
    <option value="Coche">Coche</option>
    <option value="Camioneta">Camioneta</option>
</select>
<br><input type="submit" value="{{$modo}} datos"><br>
<a href="{{url('crud-autos')}}">Regresar</a>