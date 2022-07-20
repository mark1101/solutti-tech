<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'Electrolux'],
            ['name' => 'Brastemp'],
            ['name' => 'Fischer'],
            ['name' => 'Samsung'],
            ['name' => 'LG']
        ];

        Brand::insert($brands);
    }
}
