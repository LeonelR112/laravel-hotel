@extends('mainTemplate')
@section("title", "Editor de Habitaciones")
@section("content")
    <section class="container">
        <h5 class="text-center inicio my-4">Editor de Habitaciones</h5>
        <hr>
        <div class="row justify-content-center g-2 m-0">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('editor/habitaciones')}}">Habitaciones</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modificar habitación</li>
                    </ol>
                </nav>                  
            </div>
            <div class="col-12 col-md-11 col-lg-10">
                <form action="{{url('editor/habitaciones/actualizar')}}" method="POST">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="id_hab" value="{{$HabitacionSeleccionada->id_hab}}">
                    <h5 class="text-center">Modificar una habitación:</h5>
                    <article class="row m-0">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="input_nro_hab" class="form-label">Número de habitación</label>
                                <input type="number" name="nro_habitacion" class="form-control @error('nro_habitacion') is-invalid @enderror" id="input_nro_hab" placeholder="" value="{{old('nro_habitacion', $HabitacionSeleccionada->nro_habitacion)}}" min="0">
                                <div class="invalid-feedback">@error('nro_habitacion') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="selector_hab" class="form-label">Tipo de habitación</label>
                                <select class="form-select @error('tipo_habitacion') is-invalid @enderror" name="tipo_habitacion" aria-label="Default select example">
                                    <option value="0" {{old('tipo_habitacion', 'selected') == "0" ? 'selected' : ""}}>Seleccione un valor</option>
                                    <option value="individual" {{old('tipo_habitacion') == "individual" || $HabitacionSeleccionada->tipo_habitacion == 'individual' ? 'selected' : ""}}>Individual</option>
                                    <option value="doble" {{old('tipo_habitacion') == "doble" || $HabitacionSeleccionada->tipo_habitacion == 'doble' ? 'selected' : ""}}>Doble</option>
                                    <option value="suite" {{old('tipo_habitacion') == "suite" || $HabitacionSeleccionada->tipo_habitacion == 'suite' ? 'selected' : ""}}>Suite</option>
                                </select>
                                <div class="invalid-feedback">@error('tipo_habitacion') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="input_nro_hab" class="form-label">Precio</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" id="input_precio" placeholder="" value="{{old('precio', $HabitacionSeleccionada->precio)}}" min="0">
                                    <div class="invalid-feedback">@error('precio') {{$message}} @enderror</div>
                                </div>                                  
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="input_nro_hab" class="form-label">Disponible</label>
                                <select class="form-select @error('disponible') is-invalid @enderror" name="disponible" aria-label="Default select example">
                                    <option value="1" {{old('disponible') == "1" || $HabitacionSeleccionada->disponible == '1' ? 'selected' : ""}}>Si</option>
                                    <option value="0" {{old('disponible') == "0" || $HabitacionSeleccionada->disponible == '0' ? 'selected' : ""}}>No</option>
                                </select>
                                <div class="invalid-feedback">@error('disponible') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="input_nro_hab" class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="" cols="30" rows="4">{{old('descripcion', $HabitacionSeleccionada->descripcion)}}</textarea>
                                <div class="invalid-feedback">@error('descripcion') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-dark px-4" type="submit">Guardar</button>
                        </div>
                    </article>
                </form>
            </div>
        </div>
    </section>
@endsection