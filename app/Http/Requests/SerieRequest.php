<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:256',
            'content' => 'nullable|string|min:3|max:2560',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'in:active,inactive',
            'author_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O nome é obrigatório.',
            'title.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'title.max' => 'O nome deve ter no máximo 256 caracteres.',

            'content.required' => 'O conteúdo/descrição é obrigatório.',
            'content.min' => 'O conteúdo/descrição deve ter no mínimo 3 caracteres.',
            'content.max' => 'O conteúdo/descrição deve ter no máximo 2560 caracteres.',

            'rating.numeric' => 'A avaliação deve ser numérica de 0 a 5.',
            'rating.min' => 'Uma avaliação deve ter no mínimo nota 0.',
            'rating.max' => 'Uma avaliação deve ter no máximo nota 5.',

            'status.in' => 'Um status só pode ser active ou inactive.',

            'author_id.required' => 'O autor é obrigatório.',
        ];
    }
}
