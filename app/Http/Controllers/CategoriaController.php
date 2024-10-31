<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la tabla 'bitacora'
        $genero_producto = categoria::all();

        // Retornar la vista 'bitacora.index' y pasarle los datos
        return view('profile.inventario.categoria', compact('categoria'));
    }
}
