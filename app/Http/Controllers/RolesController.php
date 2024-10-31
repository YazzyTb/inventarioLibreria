<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;


class RolesController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la tabla 'bitacora'
        $rol = Rol::all();

        // Retornar la vista 'bitacora.index' y pasarle los datos
        return view('profile.roles.roles', compact('rol'));
    }
    public function create()
    {
        return view('profile.roles.createRol');
    }

    public function store(Request $request)
{
    // Validar únicamente los campos de la tabla 'rol'
    $validatedData = $request->validate([
        
        'nombre' => 'required|string|max:255',    // 'nombre' es requerido y tipo string
        'descripcion' => 'required|string',       // 'descripcion' es requerido y tipo string
    ]);

    // Crear el nuevo rol
    Rol::create($validatedData);

    return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
    }

    public function show(int $rol){  // para devolver un usuario buscado por CI
        $rol=Rol::find($rol);
        if(!$rol){
            return redirect()->back()->with('error', 'Rol no encontrado');  
        }
            return view('roles.show',compact('rol'));  
        //esto redirecciona a una vista para ver el cliente correspondiente al 
        // CI que recibio de parametro  
        }

        public function edit($id)
        {
            $rol = Rol::findOrFail($id);
            return view('profile.roles.rolEdit', compact('rol'));
        }
        

        public function update(Request $request, $id)
        {
            $rol = Rol::findOrFail($id);
            $rol->update($request->all());
        
            return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
        }
        
       
       public function destroy(int $rol)
        {
        $rol = Rol::find($rol); // Busca el rol por ID

         // Verifica si el rol existe antes de eliminar
            if (!$rol) {
            return redirect()->route('roles.index')->with('error', 'Rol no encontrado.');
            }

            // Intenta eliminar el rol
        $rol->delete();

        // Redirige de nuevo al índice con un mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
}


}
