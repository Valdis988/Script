<?php

namespace Database\Seeders;

use App\Models\Veterinarian;
use Illuminate\Database\Seeder;

class VeterinarianSeeder extends Seeder
{
    public function run(): void
    {
        $vets = [
            ['name' => 'Олександр Коваленко', 'position' => 'Головний хірург',
                'specialization' => 'Хірургія, ортопедія, травматологія',
                'experience_years' => 10, 'phone' => '+380 50 111 22 01'],
            ['name' => 'Олена Шевченко', 'position' => 'Терапевт-діагност',
                'specialization' => 'Внутрішні хвороби, УЗД-діагностика',
                'experience_years' => 7, 'phone' => '+380 50 111 22 02'],
            ['name' => 'Василь Петренко', 'position' => 'Ратолог',
                'specialization' => 'Лікування гризунів, екзотичних тварин',
                'experience_years' => 5, 'phone' => '+380 50 111 22 03'],
            ['name' => 'Марія Бондаренко', 'position' => 'Дерматолог',
                'specialization' => 'Шкірні захворювання, алергології',
                'experience_years' => 8, 'phone' => '+380 50 111 22 04'],
            ['name' => 'Андрій Мельник', 'position' => 'Стоматолог',
                'specialization' => 'Ультразвукова чистка зубів, лікування ротової порожнини',
                'experience_years' => 6, 'phone' => '+380 50 111 22 05'],
            ['name' => 'Ірина Ткаченко', 'position' => 'Терапевт-діагност',
                'specialization' => 'Лабораторна діагностика, вакцинація',
                'experience_years' => 4, 'phone' => null],
        ];

        foreach ($vets as $vet) {
            Veterinarian::create($vet);
        }
    }
}
