@extends('layouts.app')

@section('title', 'Наші Ветеринари - Лапи та Хвости')

@section('content')
    <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="color: #20b2aa; margin-top: 0; text-align: center;">Наші спеціалісти</h1>
        <p style="text-align: center; color: #555; margin-bottom: 30px; font-size: 16px;">
            Команда професіоналів, які люблять тварин і знають свою справу.
        </p>

        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <!-- Картка лікаря 1 -->
            <div style="border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; width: 250px; text-align: center;">
                <h3 style="margin-bottom: 5px; color: #333;">Олександр Коваленко</h3>
                <p style="color: #20b2aa; font-weight: bold; margin-top: 0;">Головний хірург</p>
                <p style="color: #666; font-size: 14px; line-height: 1.5;">Спеціалізація: Хірургія, ортопедія, травматологія. Досвід 10 років.</p>
            </div>

            <!-- Картка лікаря 2 -->
            <div style="border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; width: 250px; text-align: center;">
                <h3 style="margin-bottom: 5px; color: #333;">Олена Шевченко</h3>
                <p style="color: #20b2aa; font-weight: bold; margin-top: 0;">Терапевт-діагност</p>
                <p style="color: #666; font-size: 14px; line-height: 1.5;">Спеціалізація: Внутрішні хвороби, УЗД-діагностика. Досвід 7 років.</p>
            </div>

            <!-- Картка лікаря 3 -->
            <div style="border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; width: 250px; text-align: center;">
                <h3 style="margin-bottom: 5px; color: #333;">Василь Петренко</h3>
                <p style="color: #20b2aa; font-weight: bold; margin-top: 0;">Ратолог</p>
                <p style="color: #666; font-size: 14px; line-height: 1.5;">Спеціалізація: Лікування гризунів, екзотичних тварин. Досвід 5 років.</p>
            </div>
        </div>
    </div>
@endsection
