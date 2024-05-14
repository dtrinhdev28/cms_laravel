<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsModel;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        ProductsModel::factory(10)->create();
        // ProductsModel::factory()
        // ->count(50)
        // ->create();
    }
}
