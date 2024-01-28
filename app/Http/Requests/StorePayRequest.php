<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Validator;

class StorePayRequest extends FormRequest
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
        $fechaActual = Carbon::now()->format('Y-m-01');
        return [
            'cuartos' => ['required', 'integer','min:1', 'max:5'],
            'banos_extra' => ['required', 'integer','min:0'],
            'medio_banos_extra' => ['required', 'integer','min:0'],
            'sala_oficina' => ['required', 'integer','min:0'],
            'horno' => ['required', 'integer','min:0'],
            'refri' => ['required', 'integer','min:0'],
            'socalo' => ['required', 'integer','min:0'],
            'zotano' => ['required', 'integer','min:0'],
            'ventana' => ['required', 'integer','min:0'],
            'persiana' => ['required', 'integer','min:0'],
            'mascotas' => ['required', 'integer','min:0'],
            'mascotas' => ['required', 'integer','min:0'],
            'id_product' => ['required', 'integer','min:1', 'max:3'],
            'tipo' => ['required',  Rule::in(['basico', 'profundo'])],
            'fecha_seleccionada1' => ['required', 'date', "after_or_equal:$fechaActual"],
            'hora1' => ['required', 'integer','min:1', 'max:12'],
            'hora2' => ['bail','exclude_unless:id_product,3', 'integer','min:1', 'max:12'],
            'fecha_seleccionada2' => ['bail','exclude_unless:id_product,3', 'min:1', 'max:12']];
    }

    public function after(): array
    {
        if(isset($this->tipo) && isset($this->fecha_seleccionada1) && $this->id_product == 3){
            return [
                function (Validator $validator) {
                    $fecha1 = Carbon::parse($this->fecha_seleccionada1);
                    $fechaValidar = Carbon::parse($this->fecha_seleccionada2);
                    if(($fechaValidar->month <>  $fecha1->month) ||  ($fechaValidar->year <>  $fecha1->year) || ($fecha1 ==  $fechaValidar)){
                        $validator->errors()->add(
                            'dates',
                            "Error in dates seleted"
                        );
                    }
                }
            ];
        }
        return [];
    }
}
