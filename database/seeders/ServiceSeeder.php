<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        if (Service::exists()) {
            return;
        }

        $items = [
            [
                'price' => 400,
                'uk' => ['Первинний огляд', 'Повний клінічний огляд тварини, консультація та рекомендації лікаря.'],
                'en' => ['Initial examination', 'Full clinical examination of your pet with a vet consultation and recommendations.'],
            ],
            [
                'price' => 350,
                'uk' => ['Вакцинація', 'Комплексна вакцинація собак і котів з оформленням ветеринарного паспорта.'],
                'en' => ['Vaccination', 'Comprehensive vaccination for dogs and cats, including the pet passport entry.'],
            ],
            [
                'price' => 600,
                'uk' => ['Стоматологія', 'Професійна чистка зубів, видалення зубного каменю та лікування ротової порожнини.'],
                'en' => ['Dental care', 'Professional teeth cleaning, tartar removal and oral cavity treatment.'],
            ],
            [
                'price' => 700,
                'uk' => ['УЗД-діагностика', 'Ультразвукове дослідження внутрішніх органів без стресу для тварини.'],
                'en' => ['Ultrasound diagnostics', 'Ultrasound examination of internal organs, stress-free for your pet.'],
            ],
            [
                'price' => 2500,
                'uk' => ['Хірургія', 'Планові та термінові операції в сучасній операційній з анестезіологічним супроводом.'],
                'en' => ['Surgery', 'Planned and emergency operations in a modern surgical room with anesthesia support.'],
            ],
            [
                'price' => 1800,
                'uk' => ['Стерилізація та кастрація', 'Безпечне хірургічне втручання з післяопераційним доглядом.'],
                'en' => ['Spaying and neutering', 'A safe surgical procedure with post-operative care.'],
            ],
            [
                'price' => 500,
                'uk' => ['Лабораторні аналізи', 'Аналізи крові, сечі та калу зі швидкою розшифровкою результатів.'],
                'en' => ['Laboratory tests', 'Blood, urine and stool tests with fast interpretation of results.'],
            ],
            [

                'price' => 450,
                'uk' => ['Грумінг', 'Купання, стрижка та догляд за шерстю й кігтями.'],
            ],
        ];

        foreach ($items as $item) {
            $service = Service::create(['price' => $item['price']]);

            foreach (['uk', 'en'] as $locale) {
                if (! isset($item[$locale])) {
                    continue;
                }

                $service->translations()->create([
                    'locale'      => $locale,
                    'name'        => $item[$locale][0],
                    'description' => $item[$locale][1],
                ]);
            }
        }
    }
}
