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
        return [
            'name' => 'required',
            'cpf' => 'regex:/[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/|required|unique:users',
            'data_nascimento' => 'date_format:d/m/Y|required',
            'email' => 'email|required',
            'senha' => 'required',
            'confirmar_senha' => 'same:senha|required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome completo',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de nascimento',
            'email' => 'Email',
            'senha' => 'Senha',
            'confirmar_senha' => 'Confirmar senha',
        ];
    }
}
