@extends('mainTemplate')
@section('title', 'Usuarios | Editar usuario')
@section('content')
    <div class="row m-0 justify-content-center align-items-center">
        <div class="col-12 col-md-6 mt-3 shadow p-3">
            <h2 class="text-center">Editar Usuario</h2>
            <form action="{{route("usuarios.store")}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="input_nombre" name="nombre" value="{{ old('nombre') ?? $usuario->nombre }}" placeholder="Ingresa tu nombre">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="input_apellido" name="apellido" value="{{ old('apellido') ?? $usuario->apellido }}" placeholder="Ingresa tu apellido">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="input_email" name="email" value="{{ old('email') ?? $usuario->email }}" placeholder="Ingresa tu email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="input_telefono" name="telefono" value="{{ old('telefono') ?? $usuario->telefono }}" placeholder="Ingresa tu teléfono">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select @error('rol') is-invalid @enderror" id="input_rol" name="rol">
                        <option value="1" {{ (old('rol') ?? $usuario->rol) == 1 ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ (old('rol') ?? $usuario->rol) == 2 ? 'selected' : '' }}>Recepcionista</option>
                        <option value="3" {{ (old('rol') ?? $usuario->rol) == 3 ? 'selected' : '' }}>Cliente</option>
                    </select>
                    @error('rol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
@section('footers-scripts')
    
@endsection