<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::paginate(10); // 10 usuarios por página
        return view("usuarios.index", compact('usuarios'));
    }

    public function create(){
        return view("usuarios.create");
    }

    public function store(StoreUsuarioRequest $request){
        $data = $request->validated();
        $data['fecha_registro'] = now();

        Usuario::create($data);
        return redirect()->route("usuarios.index")->with('success', 'Usuario creado exitosamente.');;
    }

    public function edit($id_usuario){
        $usuario = Usuario::find($id_usuario);
        if($usuario){
            return view("usuarios.edit", compact('usuario'));
        }else{
            $tipo = 'danger';
            $mensaje = 'Usuario no encontrado';
            return redirect()->route("usuarios.index")->with($tipo, $mensaje);;
        }
    }

    public function update(StoreUsuarioRequest $request, $id_usuario){
        $usuario = Usuario::find($id_usuario);
        if($usuario){
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->rol = $request->rol;
    
            $usuario->save();
            $tipo = 'success';
            $mensaje = 'Usuario actualizado exitosamente';
        }else{
            $tipo = 'danger';
            $mensaje = 'Usuario no encontrado';
        }

        return redirect()->route("usuarios.index")->with($tipo, $mensaje);;
    }

    public function destroy($id_usuario){
        $usuario = Usuario::find($id_usuario);
        if($usuario){
            $usuario->delete();
            $tipo = 'success';
            $mensaje = 'Usuario eliminado exitosamente';
        }else{
            $tipo = 'danger';
            $mensaje = 'Usuario no encontrado';
        }
        return redirect()->route("usuarios.index")->with($tipo, $mensaje);
    }
}
