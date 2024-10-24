<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHabitacionResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           "nro_habitacion" => "required|min:0",
           "tipo_habitacion" => "required|string|not_in:0",
           "precio" => "required|min:0",
           "disponible" => "required",
           "descripcion" => "required|min:4|max:500"
        ];
    }

    public function messages()
    {
        return [
            "nro_habitacion.required" => "El número de habitación es obligatorio.",
            "nro_habitacion.min" => "El número de habitación debe ser positivo.",
            "tipo_habitacion.required" => "El tipo de habitación es requerido!",
            "tipo_habitacion.string" => "El valor ingresado no es válido, debe ser un texto",
            "tipo_habitacion.not_in" => "Seleccione un tipo de habitació!",
            "precio.required" => "Ingrese un precio!",
            "precio.min" => "El precio ingresado no es válido",
            "disponible.required" => "Seleccione una opción válida",
            "descripcion.required" => "Ingrese una descripción de la habitación.",
            "descripcion.min" => "La descripción es demasiada corta. Mínimo 4 caracteres.",
            "descripcion.max" => "La descripción es demasiada larga, no debe superar los 500 caracteres."
        ];
    }

    public function attributes()
    {
        return [
            "nro_habitacion" => "N° de habitación",
            "tipo_habitacion" => "Tipo de habitación",
            "disponible" => "ddisponibilidad",
            "descripcion" => "descripcion"
        ];
    }
}
