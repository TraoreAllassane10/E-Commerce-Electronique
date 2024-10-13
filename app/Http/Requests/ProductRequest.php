<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'libelle' => 'required',
            'image' => 'required',
            'prix' => 'required',
            'category_id' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                "success" => false,
                "error" => true,
                "message" => "Erreur de validation",
                "errorList" => $validator->errors()
            ]
        ));
    }

    public function messages()
    {
        return [
            'libelle.required' => 'Entrez un libelle',
            'image.required' => 'Entrez une image',
            'prix.required' => 'Entrez un prix',
            'category_id.required' => 'Entrez une category',
        ];
    }
}
