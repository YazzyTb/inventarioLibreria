<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClientesController extends Controller
{
    public function index()
    {
        $cliente = Cliente::all(); // Asume que tienes un modelo Bitacora
        return view('profile.clientes.cliente', compact('cliente'));
        
    }
    // Mostrar el formulario de registro de clientes
 public function create()
 {
  return view('profile.clientes.FormCliente');
 }


 // Guardar el nuevo cliente en la base de datos
 public function store(Request $request)
 {
     // Validar los datos
     $request->validate([
         'ci' => 'required|int', 
         'nombre' => 'required|string|max:50',
         'puntos' => 'required|int|max:100',
     ]);

     // Crear un nuevo cliente de forma masiva
     Cliente::create($request->all());
     // Redirigir a la tabla de clientes
     return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
     //redirect('/clientes')->with('success', 'Cliente registrado correctamente.');
 }

public function show(int $cliente){  // para devolver un usuario buscado por CI
$cliente=Cliente::find($cliente);
if(!$cliente){
    return redirect()->back()->with('error', 'Cliente no encontrado');  
}
    return view('cliente.show',compact('cliente'));  
//esto redirecciona a una vista para ver el cliente correspondiente al 
// CI que recibio de parametro  
}

public function edit(int $cliente){
 $cliente=Cliente::find($cliente);    
return view('profile.clientes.clienteEdit',compact('cliente'));// va a  una vista para editar  
}

public function update(Request $request,int $cliente){
 $cliente =Cliente::find($cliente);   
 $cliente->update($request->all());
 return redirect()->route('clientes.index')->with('success', 'Cliente modificado correctamente.');    
}

public function destroy(int $cliente){
 $cliente=Cliente::find($cliente);   
 $cliente->delete();
 return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');     
 }
}
