<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT' || $method == 'POST') {
            $isRequiredOrSometimes = 'required';
        } else {
            $isRequiredOrSometimes = 'sometimes';
        }

        return [
            'codigo_do_cliente' => "$isRequiredOrSometimes|exists:clientes,id",
            'codigo_do_produto' => "$isRequiredOrSometimes|exists:produtos,id",
        ];
    }
}
