<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nome' => 'required|min:5|max:120',
            'email' => 'required|min:5|max:120',
            'senha' => 'required|min:8|max:18',
            'funcao' => 'required|min:5|max:120',   
            'data_nascimento' => 'required|min:5|max:120|numeric',   
            'salario' => 'required|min:3|max:15|numeric'    
        ];
    }
}
