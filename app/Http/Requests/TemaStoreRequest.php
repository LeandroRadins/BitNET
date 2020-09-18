<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'nombre' => 'required|unique:temas',
                    'descripcion' => 'required',
                ];
            case 'PUT':
                return [
                    'nombre' => 'required|unique:temas,nombre,' . $this->tema->id,
                    'descripcion' => 'required',
                ];
            default:
                break;
        }
        
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar un nombre para el tema',
            'nombre.unique' => 'Este nombre de tema ya existe',
            'descripcion.required' => 'Debe ingresar una descripcion para el tema',
        ];
    }
}
