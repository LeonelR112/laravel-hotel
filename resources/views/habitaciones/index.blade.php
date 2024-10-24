@extends('mainTemplate')
@section("title", "Editor de Habitaciones")
@section("content")
    <section class="container">
        <h5 class="text-center inicio my-4">Editor de Habitaciones</h5>
        <hr>
        <div class="row g-2 m-0">
            @if(session('status_form'))
                @php
                    $datos_status = session('status_form')
                @endphp
                @if($datos_status['status'] == 'success')
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle-fill"></i> {{$datos_status['msg']}}
                        </div>                          
                    </div>
                @elseif($datos_status['status'] == 'danger')
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-check-circle-fill"></i> {{$datos_status['msg']}}
                        </div>                          
                    </div>
                @endif
            @endif
            <div class="col-12">
                <a href="{{url('editor/habitaciones/nuevo')}}" class="btn btn-dark">+ Nueva habitación</a>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="table-dark text-center" colspan="6">Habitaciones registradas</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">N° habitación</th>
                                <th scope="col" class="text-center">Tipo</th>
                                <th scope="col" class="text-center">Precio</th>
                                <th scope="col" class="text-center">disponible</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($habitaciones) > 0)
                                @foreach ($habitaciones as $habitacion)
                                    <tr>
                                        <td>{{$habitacion['id_hab']}}</td>
                                        <td class="text-center">{{$habitacion['nro_habitacion']}}</td>
                                        <td class="text-center">{{$habitacion['tipo_habitacion']}}</td>
                                        <td class="text-center">$ {{number_format($habitacion['precio'], 0, ".", ",")}}</td>
                                        <td class="text-center">{!! $habitacion['disponible'] == 1 ? '<span class="badge bg-success">Si</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                                        <td class="text-end">
                                            <a href="{{url("editor/habitaciones/modificar/" . $habitacion['id_hab'])}}" class="btn btn-dark btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <button class="btn btn-danger btn-sm" type="button" onclick="borrarHabitacion(`{{$habitacion['id_hab']}}`)" title="Borrar"><i class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-muted small">No hay habitaciones disponibles...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="{{url('editor/habitaciones/borrar')}}" method="POST" id="form_del">
            @csrf
            @method('delete')
            <input type="hidden" name="id_hab" id="input_id_hab">
        </form>
    </section>
@endsection
@section('footers-scripts')
    <script src="{{asset('js/scripts/editorHabitaciones.js')}}"></script>
@endsection