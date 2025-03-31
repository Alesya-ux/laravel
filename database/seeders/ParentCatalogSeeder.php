<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog;
class ParentCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catalog::create([
            'name'=> 'Дезковрики и антибактериальные коврики',

        ]);
        Catalog::create([
            'name'=> 'Оборудование для дезинфекции',

        ]);
        Catalog::create([
            'name'=> 'Дозаторы',

        ]);
        Catalog::create([
            'name'=> 'Перекись',

        ]);
        Catalog::create([
            'name'=> 'Преобразователь ржавчины. Обежириватель',

        ]);
    }
}
