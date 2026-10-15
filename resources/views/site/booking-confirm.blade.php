@extends('layouts.app')

@section('title', 'Заявку прийнято')

@section('content')
    <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center;">
        <h1 style="color: #20b2aa; margin-top: 0;">Дякуємо, {{ $name }}!</h1>
        <p style="font-size: 18px; line-height: 1.6; color: #555;">
            Ваша заявка на прийом успішно надіслана. Адміністратор зателефонує вам найближчим часом.
        </p>

        <div style="background: #f4f7f6; padding: 20px; border-radius: 8px; text-align: left; max-width: 500px; margin: 20px auto;">
            <p><strong>Контакти:</strong> {{ $phone }}, {{ $email }}</p>
            <p><strong>Дата прийому:</strong> {{ $date }}</p>
            <p><strong>Послуга:</strong> {{ $service }}</p>
            <p><strong>Деталі:</strong><br> {{ $message }}</p>
        </div>

        <a href="{{ route('booking.form') }}" style="display: inline-block; margin-top: 20px; background-color: #2c3e50; color: white; padding: 10px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
            Повернутися до форми
        </a>
    </div>
@endsection
