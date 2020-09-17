<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
                    'name' => 'required|unique:roles',
                    'slug' => 'required|unique:roles',
                    'description' => 'required',
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:roles,name,' . $this->role->id,
                    'slug' => 'required|unique:roles,slug,' . $this->role->id,
                    'description' => 'required',
                ];
            default:
                break;
        }
        
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre para el rol',
            'name.unique' => 'Debe ingresar un nombre unico',
            'slug.required' => 'Debe ingresar un slug',
            'slug.unique' => 'Debe ingresar un slug unico',
            'description.required' => 'Debe ingresar una descripcion para el rol',
        ];
    }
}
