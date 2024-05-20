<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['Sam sung', 'Xiaomi', 'Apple', 'OPPO', 'Vivo'];


        foreach ($name as $key => $value) {
            \DB::table('category')->insert(
                ['name_category' => $value, 
                'order' => $key + 1 ,
                'hidden' => rand(0,1),
                ]
            );
        }

    }
}
