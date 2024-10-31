<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado; // Asegúrate de tener un modelo para la tabla bitacora

class EmpleadosController extends Controller
{
    public function index()
    {
        $user = Empleado::all(); // Asume que tienes un modelo Bitacora
        return view('profile.empleados.empleado', compact('empleado'));
        
    }
    
}