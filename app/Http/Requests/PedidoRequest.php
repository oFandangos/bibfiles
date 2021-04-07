<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'nome'       => 'required',
            'email'      => 'required',
            'finalidade' => 'required',
            'files_id'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do requisitante deve ser informado',
            'email.required' => 'O email do requisitante deve ser informado',
            'finalidade.required' => 'O motivo do pedido deve ser informado',
        ];
    }
}
