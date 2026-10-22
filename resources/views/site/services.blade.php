@extends('layouts.app')

@section('title', 'Послуги - Вуса, Лапи, Хвіст')

@section('content')
    <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="color: #20b2aa; margin-top: 0; text-align: center;">Наші Послуги</h1>
        <p style="text-align: center; color: #555; margin-bottom: 30px; font-size: 16px;">
            Ми пропонуємо широкий спектр ветеринарної допомоги для збереження здоров'я ваших улюбленців.
        </p>

        <div style="display: flex; flex-direction: column; gap: 20px; max-width: 800px; margin: 0 auto;">

            <!-- Послуга 1 -->
            <div style="border-left: 4px solid #20b2aa; padding: 15px 20px; background: #f4f7f6; border-radius: 0 8px 8px 0; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                <h3 style="margin-top: 0; color: #2c3e50;">Консультація та огляд</h3>
                <p style="color: #666; margin-bottom: 0; line-height: 1.5;">
                    Повний клінічний огляд тварини, збір анамнезу, вимірювання температури, постановка попереднього діагнозу та призначення курсу лікування.
                </p>
            </div>

            <!-- Послуга 2 -->
            <div style="border-left: 4px solid #20b2aa; padding: 15px 20px; background: #f4f7f6; border-radius: 0 8px 8px 0; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                <h3 style="margin-top: 0; color: #2c3e50;">Вакцинація та чипування</h3>
                <p style="color: #666; margin-bottom: 0; line-height: 1.5;">
                    Профілактичні щеплення для собак, котів та екзотичних тварин. Міжнародне чипування та допомога в оформленні ветеринарних паспортів.
                </p>
            </div>

            <!-- Послуга 3 -->
            <div style="border-left: 4px solid #20b2aa; padding: 15px 20px; background: #f4f7f6; border-radius: 0 8px 8px 0; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                <h3 style="margin-top: 0; color: #2c3e50;">Хірургія та стоматологія</h3>
                <p style="color: #666; margin-bottom: 0; line-height: 1.5;">
                    Планові (кастрація, стерилізація) та ургентні хірургічні втручання. Ультразвукова чистка зубів та лікування захворювань ротової порожнини.
                </p>
            </div>

            <!-- Послуга 4 -->
            <div style="border-left: 4px solid #20b2aa; padding: 15px 20px; background: #f4f7f6; border-radius: 0 8px 8px 0; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                <h3 style="margin-top: 0; color: #2c3e50;">Лабораторна та УЗД діагностика</h3>
                <p style="color: #666; margin-bottom: 0; line-height: 1.5;">
                    Швидкі тести, розгорнутий аналіз крові, дослідження сечі. Ультразвукова діагностика внутрішніх органів на сучасному обладнанні.
                </p>
            </div>

        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ url('/booking') }}" style="display: inline-block; background-color: #20b2aa; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 16px;">
                Записатися на прийом
            </a>
        </div>
    </div>
@endsection
