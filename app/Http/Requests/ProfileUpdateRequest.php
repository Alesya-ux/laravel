<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'client_type' => ['required', 'string', 'in:individual,legal'],
            'phone' => ['nullable', 'string', 'max:20'],
        ];

        // Добавляем правила для юридических лиц
        if ($this->input('client_type') === 'legal') {
            $rules['unp'] = ['required', 'string', 'max:15', 'regex:/^\d{9}$/'];
            $rules['company_name'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
