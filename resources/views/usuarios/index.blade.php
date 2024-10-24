@extends('mainTemplate')
@section('title', 'Usuarios')
@section('content')
    <div class="container">
        <div class="row m-0">
            <div class="col-12 col-md-6 mt-3 p-3">
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear usuario +</a><br>
              
            </div>
            <div class="col-12">
                <h1 class="mb-4">Lista de Usuarios</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                 @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id_usuario }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>
                                    @if ($usuario->rol == 1)
                                        Administrador
                                    @elseif ($usuario->rol == 2)
                                        Recepcionista
                                    @else
                                        Cliente
                                    @endif
                                </td>
                                <td>{{ $usuario->fecha_registro}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('usuarios.edit', $usuario->id_usuario)}}" class="btn btn-secondary" title="Editar usuario"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger ms-2" title="Borrar usuario"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No hay usuarios creados..</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
