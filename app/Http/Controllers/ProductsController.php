<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coment;

class ProductsController extends Controller
{
    public function show()
    {
        $productos = Product::all();
        return view('productos', compact('productos'));
    }

    public function productoVer($productoVer)
    {

        $producto = Product::where('nombre', $productoVer)->first();

        if ($producto == null) {
            abort(404);
        }

        $comentarios = Coment::where('product_id', $producto->id)
            ->join('users', 'coments.user_id', '=', 'users.id')
            ->get();
        return view('detalleProducto', compact(['producto', 'comentarios']));
    }


    public function busqueda(Request $request)
    {
        $productos = Product::where('nombre',  'Like', '%' . $request->nombre . '%')->get();

        return view('productos', compact('productos'));
    }

    public function busquedaAvanzada(Request $request)
    {

        $productos = Product::where('marca',  'Like', '%' . $request->marca . '%')->where('categoria', $request->categoria)->get();

        $data = [
            'productos' => $productos,
        ];
        if ($productos == null) {
            return 'No hay productos';
        }


        return view('busqueda', $data);
    }
}
