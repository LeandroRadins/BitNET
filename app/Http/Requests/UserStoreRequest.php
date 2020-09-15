<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
                    //'email' => 'required|email|unique:users',
                    'password' => 'required',
                ];
            case 'PUT':
                $id = $this->route('user')->id;
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,{$id},id,deleted_at,NULL',
                    //'email' => 'required|email|unique:users,email,' . $this->user->id,
                    'password' => 'required',
                ];
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre de usuario',
            'email.required' => 'Debe ingresar un email',
            'email.email' => 'Debe ingresar un email valido',
            'email.unique' => 'Debe ingresar un email valido',
            'password.required' => 'Debe ingresar una contraseña valida',
        ];
    }
}
