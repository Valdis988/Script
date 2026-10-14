<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Будь ласка, вкажіть ваше ім\'я.',
            'email.required' => 'Поле Email є обов\'язковим.',
            'email.email' => 'Введіть коректну email адресу.',
            'message.required' => 'Опишіть, будь ласка, причину звернення.',
            'message.min' => 'Повідомлення має містити щонайменше 10 символів.',
        ];
    }
}
