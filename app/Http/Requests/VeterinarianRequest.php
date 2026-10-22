<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeterinarianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'             => ['required', 'string', 'max:100'],
            'position'         => ['required', 'string', 'max:100'],
            'specialization'   => ['required', 'string', 'max:255'],
            'experience_years' => ['required', 'integer', 'min:0', 'max:60'],
            'phone'            => ['nullable', 'string', 'max:20', 'regex:/^\+?[0-9\s\-\(\)]{7,20}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле «:attribute» обов’язкове для заповнення.',
            'max'      => 'Поле «:attribute» занадто довге (максимум :max).',
            'integer'  => 'Поле «:attribute» має бути цілим числом.',
            'min'      => 'Мінімальне значення поля «:attribute» — :min.',
            'phone.regex' => 'Невірний формат телефону.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'             => 'ПІБ',
            'position'         => 'Посада',
            'specialization'   => 'Спеціалізація',
            'experience_years' => 'Досвід (років)',
            'phone'            => 'Телефон',
        ];
    }
}
