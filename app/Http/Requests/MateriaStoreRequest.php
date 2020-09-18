<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaStoreRequest extends FormRequest
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
                    'nombre' => 'required|unique:materias',
                    'descripcion' => 'required',
                    'link' => 'required',
                ];
            case 'PUT':
                return [
                    'nombre' => 'required|unique:materias,nombre,' . $this->materia->id,
                    'descripcion' => 'required',
                    'link' => 'required',
                ];
            default:
                break;
        }
        
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar un nombre para la materia',
            'nombre.unique' => 'Este nombre de materia ya existe',
            'descripcion.required' => 'Debe ingresar una descripcion para la materia',
            'link.required' => 'Debe ingresar una URL del aula virtual para la materia',
        ];
    }
}
