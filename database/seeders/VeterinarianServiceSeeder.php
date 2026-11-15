<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Veterinarian;
use Illuminate\Database\Seeder;

class VeterinarianServiceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Якщо послуг немає — створюємо їх разом з перекладами (uk)
        if (Service::count() === 0) {
            $items = [
                [350,  'Первинний огляд',          'Огляд тварини та консультація лікаря'],
                [600,  'Вакцинація',               'Щеплення від поширених інфекцій'],
                [900,  'Ультразвукова діагностика', 'УЗД внутрішніх органів'],
                [450,  'Лабораторні аналізи',      'Загальний та біохімічний аналіз крові'],
                [1200, 'Чистка зубів',             'Ультразвукова чистка зубів'],
                [2500, 'Хірургічна операція',      'Планові та термінові операції'],
                [500,  'Дерматологічний огляд',    'Діагностика шкірних захворювань'],
            ];

            foreach ($items as [$price, $name, $description]) {
                $service = Service::create(['price' => $price]);

                $service->translations()->create([
                    'locale'      => 'uk',
                    'name'        => $name,
                    'description' => $description,
                ]);
            }
        }

        // 2. Прив'язуємо до кожного ветеринара від 1 до 4 послуг
        $serviceIds = Service::pluck('id');

        Veterinarian::all()->each(function (Veterinarian $vet) use ($serviceIds) {
            $count = random_int(1, min(4, $serviceIds->count()));

            $vet->services()->syncWithoutDetaching(
                $serviceIds->random($count)->all()
            );
        });
    }
}
