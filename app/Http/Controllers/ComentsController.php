<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use Illuminate\Support\Facades\Auth;

class ComentsController extends Controller
{
    public function store(Request $request)
    {
        $comentario = new Coment();
        $comentario->user_id = Auth::user()->id;
        $comentario->product_id = $request->producto;
        $comentario->titulo = $request->titulo;
        $comentario->comentario = $request->descripcion;
        $comentario->estrellas = $request->calificacion;
        $comentario->save();

        return back()->with('info', 'Se agrego la reseña');
    }
}
