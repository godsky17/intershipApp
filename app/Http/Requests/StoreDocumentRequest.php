<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'path' => 'required|min:5|max:5140|mimes:pdf,docs,ppt',
            'theme_id' => 'required|exists:themes,id',
        ];
    }

    public function messages()
    {
        return [
            'path.required' => "Ce champs est requis",
            'path.min' => "Ce champs est requis",
            'path.max' => "Le document doit avoir une taille de 5 mo",
            'path.mimes' => "Les documents autorises doivent avoir pour extention pdf, docs, ppt",
            'theme_id.required' => "Ce champs est requis",
            'theme_id.exists' => "Ce theme n'existe pas",
        ];
    }
}
