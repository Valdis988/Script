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
            'phone' => ['required', 'string', 'min:10', 'max:15'], // Додано телефон
            'date' => ['required', 'date', 'after_or_equal:today'], // Додано дату 
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Будь ласка, вкажіть ваше ім\'я.',
            'email.required' => 'Поле Email є обов\'язковим.',
            'email.email' => 'Введіть коректну email адресу.',
            'phone.required' => 'Вкажіть номер телефону для зв\'язку.',
            'phone.min' => 'Номер телефону занадто короткий.',
            'date.required' => 'Оберіть бажану дату прийому.',
            'date.after_or_equal' => 'Дата прийому не може бути в минулому.',
            'service.required' => 'Оберіть послугу.',
            'message.required' => 'Опишіть, будь ласка, причину звернення.',
            'message.min' => 'Повідомлення має містити щонайменше 10 символів.',
        ];
    }
}
