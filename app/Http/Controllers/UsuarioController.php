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

    public function edit(Usuario $usuario){
        return view("usuarios.edit", compact('usuario'));
    }

    public function update(StoreUsuarioRequest $request, $id_usuario){
        $usuario = Usuario::find($id_usuario);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->rol = $request->rol;

        $usuario->save();

        return redirect()->route("usuarios.index")->with('success', 'Usuario actualizado exitosamente.');;
    }


}
