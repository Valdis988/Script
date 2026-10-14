@extends('layouts.app')

@section('title', 'Запис на прийом - Ветклініка')

@section('content')
    <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="color: #20b2aa; margin-top: 0;">Запис на прийом</h1>

        <!-- Виведення змінної з контролера -->
        <p style="color: #555; font-size: 16px; margin-bottom: 25px;">{{ $clinicInfo }}</p>

        <form method="POST" action="{{ route('booking.store') }}" style="max-width: 500px; display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <div>
                <label for="name" style="font-weight: bold; color: #333;">Ваше ім'я та ім'я улюбленця:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-top: 5px; box-sizing: border-box;">
                @error('name')
                <p style="color: #e74c3c; font-size: 13px; margin: 5px 0 0;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" style="font-weight: bold; color: #333;">Ваш Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-top: 5px; box-sizing: border-box;">
                @error('email')
                <p style="color: #e74c3c; font-size: 13px; margin: 5px 0 0;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" style="font-weight: bold; color: #333;">Бажаний час та причина звернення:</label>
                <textarea id="message" name="message" rows="5" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-top: 5px; box-sizing: border-box;">{{ old('message') }}</textarea>
                @error('message')
                <p style="color: #e74c3c; font-size: 13px; margin: 5px 0 0;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" style="background-color: #20b2aa; color: white; border: none; padding: 12px 20px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; transition: 0.3s;">
                Надіслати заявку
            </button>
        </form>
    </div>
@endsection
