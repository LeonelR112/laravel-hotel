<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitacionResquest;
use App\Models\Habitacion;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;

class HabitacionController extends Controller
{
    public function index(){
        $habitaciones = Habitacion::orderBy("id_hab", "desc")->get();
        return view("habitaciones.index", compact("habitaciones"));
    }

    public function create(){
        return view("habitaciones.create");
    }

    public function store(StoreHabitacionResquest $request){
        $Habitacion = new Habitacion();
        $Habitacion->nro_habitacion = $request->nro_habitacion;
        $Habitacion->tipo_habitacion = $request->tipo_habitacion;
        $Habitacion->precio = $request->precio;
        $Habitacion->disponible = $request->disponible;
        $Habitacion->descripcion = $request->descripcion;
        $Habitacion->save();

        return redirect("editor/habitaciones")->with("status_form", ["status" => "success", "msg" => "Se ha creado el registro de la habitación de forma correcta"]);
    }

    public function show($id_hab){
        $HabitacionSeleccionada = Habitacion::find($id_hab);
        if($HabitacionSeleccionada->exists){
            return view("habitaciones.show", compact("HabitacionSeleccionada"));
        }
        else{
            return redirect("editor/habitaciones")->with("status_form", ["status" => "danger", "msg" => "No se ha encontrado el registro con id_hab = {$id_hab}"]);
        }
    }

    public function edit(StoreHabitacionResquest $request){
        $Habitacion = Habitacion::find($request->id_hab);
        if($Habitacion->exists){
            $Habitacion->nro_habitacion = $request->nro_habitacion;
            $Habitacion->tipo_habitacion = $request->tipo_habitacion;
            $Habitacion->precio = $request->precio;
            $Habitacion->disponible = $request->disponible;
            $Habitacion->descripcion = $request->descripcion;
            $Habitacion->save();
            return redirect("editor/habitaciones")->with("status_form", ["status" => "success", "msg" => "Se ha actualizado el registro de la habitación de forma correcta"]);
        }
        else{
            return redirect("editor/habitaciones")->with("status_form", ["status" => "danger", "msg" => "Ha ocurrido un problema al actualizar y no fue posible debido a que no se encontró el registro"]);
        }
    }

    public function destroy($id_hab){
        $habitaciion = Habitacion::find($id_hab);
        if($habitaciion->exists){
            $habitaciion->delete();
            return redirect("editor/habitaciones")->with("status_form", ["status" => "success", "msg" => "Habitación eliminada correctamente"]);
        }
        else{
            return redirect("editor/habitaciones")->with("status_form", ["status" => "danger", "msg" => "Ha ocurrido un problema al eliminar y no fue posible debido a que no se encontró el registro"]);
        }
    }
}
