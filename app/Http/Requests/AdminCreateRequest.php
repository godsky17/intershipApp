<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'min:3'],
            'first_name' => ['required', 'string', 'min:3'],
            'post' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'phone_number' => ['required', 'string', 'min:8'],
            'contrat_type' => ['required', 'string', 'min:3'],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }
}
