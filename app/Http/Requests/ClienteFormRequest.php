<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:220|min:4',
            'telefone' => 'required|max:220|min:4',
            'endereco' => 'required|max:220|min:4',
            'email' => 'required|max:220|min:4',
            'password' => 'required|max:220|min:4',
        ];
    }
}
