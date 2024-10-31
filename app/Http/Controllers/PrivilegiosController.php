<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilegio;
use App\Models\Rol;

class PrivilegiosController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la tabla 'bitacora'
        $privilegio = Privilegio::all();

        // Retornar la vista 'bitacora.index' y pasarle los datos
        return view('profile.privilegios.privilegios', compact('privilegio'));
    }

    public function asignar()
    {
        // Obtén los privilegios y roles desde la base de datos
    $privilegio = Privilegio::all();
    $rol = Rol::all();

    // Retorna la vista con los datos
    return view('profile.privilegios.asignar', compact('privilegio', 'rol'));
    }

}
