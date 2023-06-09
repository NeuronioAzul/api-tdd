<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutosRequest extends FormRequest
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

        if ($method == 'POST') {
            $isRequiredOrSometimes = 'required';
        } else {
            $isRequiredOrSometimes = 'sometimes';
        }

        return [
            'nome' => "$isRequiredOrSometimes|string|max:255",
            'preco' => "$isRequiredOrSometimes|numeric",
            'foto' => "$isRequiredOrSometimes|file|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
}
